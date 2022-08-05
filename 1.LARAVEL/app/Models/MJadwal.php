<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MJadwal extends Model
{
    use HasFactory;

    protected $table = 'm_jadwal';
    private $alias = 'mj';

    public function scopeSetAlias($query)
    {
        return $query->from($this->table . " as " . $this->alias);
    }

    protected $fillable = [
        'm_pegawai_id',
        'hari_id',
        'jam_masuk',
        'jam_pulang',
    ];

    public function scopePegawaiRelation($query)
    {
        $query->leftJoin('m_pegawai as mpe', 'mpe.id', 'mj.m_pegawai_id');
    }

    public static function defaultData()
    {
       return  ['jadwal' => MPoli::select(
            'id',
            'nama',
        )
            ->get(),

        'dokter' => MPegawai::where('job_desc_id', 1)->select('id as kode', 'nama')->get(),
        ];

    }
}
