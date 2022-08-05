<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MPoli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'kode'
    ];


    protected $table = 'm_poli';
    private $alias = 'mp';

    public function scopeSetAlias($query)
    {
        return $query->from($this->table . " as " . $this->alias);
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'kode';
    }

    public static function validateDefault($id = null)
    {
        $kode = [
            'required', 'max:6', 'string',
        ];

        $kode[] = $id ? Rule::unique('m_poli', 'kode')->where(fn ($query) => $query->where('kode', '!=', $id)) : 'unique:m_poli,kode';

        return request()->validate([
            'kode' => $kode,
            'nama' => ['required', 'string', 'max:100']
        ]);
    }

    public static function defaultData()
    {
        $search = request()->q;
        $poli = MPoli::when($search, fn ($q) => $q->where('mp.nama', 'LIKE', "%$search%")
            ->orWhere('mp.kode', 'LIKE', "%%$search"))
            ->select(
                DB::raw("DISTINCT mp.id"),
                DB::raw("if(mpe.id is null, false,true) as is_used"),
                'mp.nama',
                'mp.kode'
            )
            ->setAlias()
            ->pegawaiRelation()
            ->get();

        return compact('search', 'poli');
    }


    public function scopePegawaiRelation($query)
    {
        $query->leftJoin('m_pegawai as mpe', 'mpe.m_poli_id', 'mp.id');
    }

    public function mPegawai()
    {
        return $this->hasMany(MPegawai::class,'m_poli_id','id')->where('job_desc_id',1);
    }
}
