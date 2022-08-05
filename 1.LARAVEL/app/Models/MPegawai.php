<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MPegawai extends Model
{
    use HasFactory;

    // picture path
    public static $photoSavePath = "public/pegawai/";
    public static $photoGetPath = "/storage/pegawai/";

    protected $table = 'm_pegawai';
    private $alias = 'mpe';

    protected $fillable = [
        'job_desc_id',
        'm_poli_id',
        'photo',
        'no_pegawai',
        'sip',
        'nama',
        'jenis_kelamin',
        'alamat',
    ];


    public static function photoDefaultColumn($useAlias = true, $withUrl = true)
    {
        $pathImg = '/images/placeholder.png';
        $photo = $withUrl ? asset($pathImg) : $pathImg;
        $alias = $useAlias ? 'mpe' : 'm_pegawai';

        return DB::raw("if( $alias.photo is null, '$photo', concat('" . ($withUrl ? url('') : '') . "', $alias.photo) ) as photo");
    }


    public function scopeSetAlias($query)
    {
        return $query->from($this->table . " as " . $this->alias);
    }

    public static function generateCode($poli_id, $job_desc_id)
    {

        // find out code
        $poli = MPoli::select('kode')
            ->where('id', $poli_id)
            ->firstOrFail();
        $job_desc = JobDesc::select('kode')
            ->where('id', $job_desc_id)
            ->firstOrFail();

        $code = $poli->kode . "-" . now()->format('y') . "-";
        $index = self::where('no_pegawai', 'LIKE', "$code%")->count();

        while (true) {
            $index += 1;
            if (!self::where('no_pegawai', $code . str()->padLeft($index, 3, '0') . '-' . $job_desc->kode)->first())
                break;
        }

        return $code . str()->padLeft($index, 3, '0') . '-' . $job_desc->kode;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'no_pegawai';
    }

    public static function defaultData()
    {
        $validate = request()->validate([
            'q' => ['string', 'nullable'],
            'jobdesc' => ['array', 'nullable'],
            'jobdesc.*' => ['exists:job_desc,kode'],
            'poli' => ['array', 'nullable'],
            'poli.*' => ['exists:m_poli,kode'],
        ]);

        $poli_selected = request()->poli;
        $jobdesc_selected = request()->jobdesc;

        $search = request()->q;
        $jobdesc = JobDesc::select('kode', 'nama')->get();
        $poli = MPoli::select('kode', 'nama')->get();


        $pegawai = self::setAlias()
            ->when($poli_selected, fn ($q) => $q->whereIn('mp.kode', $poli_selected))
            ->when($jobdesc_selected, fn ($q) => $q->jobDescRelation()
                ->whereIn('jd.kode', $jobdesc_selected))
            ->when($search, fn ($q) => $q->where('mpe.nama', 'LIKE', "%$search%")
                ->orWhere('mpe.no_pegawai', 'LIKE', "%%$search")
                ->orWhere('mp.nama', 'LIKE', "%%$search"))
            ->poliRelation()
            ->jadwalRelation()
            ->select(
                DB::raw("DISTINCT mpe.id"),
                self::photoDefaultColumn(),
                DB::raw("if(mj.id is null, false,true) as is_used"),
                'mpe.nama',
                'mpe.no_pegawai',
                'mp.nama as poli',
            )
            ->get();

        $jk_opt = [
            [
                'kode' => 'L',
                'nama' => 'Laki-Laki'
            ],
            [
                'kode' => 'P',
                'nama' => 'Perempuan'
            ],
        ];

        return compact(
            'search',
            'pegawai',
            'jobdesc',
            'poli',
            'poli_selected',
            'jobdesc_selected',
            'jk_opt',
        );
    }

    public static function validateDefault($id = null)
    {

        return request()->validate([
            'nama' => ['required', 'string', 'max:100'],
            'sip' => ['string', 'max:20', 'required'],
            'nama' => ['string', 'max:100', 'required'],
            'jenis_kelamin' => ['in:L,P', 'required'],
            'job_desc_id' => ['exists:job_desc,kode', 'required'],
            'm_poli_id' => ['exists:m_poli,kode', 'required'],
            "photo" => [ 'image', 'max:10000','nullable'],
            'alamat' => ['string', 'max:500', 'nullable'],
        ]);
    }

    public function scopePoliRelation($query)
    {
        $query->join('m_poli as mp', 'mpe.m_poli_id', 'mp.id');
    }

    public function scopeJadwalRelation($query)
    {
        $query->leftJoin('m_jadwal as mj', 'mpe.id', 'mj.m_pegawai_id');
    }
    public function scopeJobDescRelation($query)
    {
        $query->leftJoin('job_desc as jd', 'mpe.job_desc_id', 'jd.id');
    }
}
