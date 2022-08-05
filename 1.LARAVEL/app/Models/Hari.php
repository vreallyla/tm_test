<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hari extends Model
{
    use HasFactory;


    protected $table = 'hari';
    private $alias = 'h';

    public $timestamps = false;

    protected $fillable = [
        'nama', 'kode'
    ];

    public function scopeSetAlias($query)
    {
        return $query->from($this->table . " as " . $this->alias);
    }

    public function scopeJadwalRelation($query, $pegawai_id)
    {
        $query->leftJoin(
            'm_jadwal as mj',
            function ($q) use ($pegawai_id) {

                $q->on(
                    'h.id',
                    '=',
                    'mj.hari_id'
                );
                $q->on('mj.m_pegawai_id', '=', DB::raw($pegawai_id));
            }
        )
            ->leftJoin('m_pegawai as mpe', 'mpe.m_poli_id', 'mj.m_pegawai_id');
    }

    public function scopeGetJadwal($query, $pegawai_id)
    {
        $sub = MJadwal::where('m_pegawai_id', $pegawai_id)->select('jam_masuk', 'jam_pulang', 'hari_id');

        $query->setAlias()
            ->leftJoinSub($sub, 'sub', function ($join) {
                $join->on('h.id', '=', 'sub.hari_id');
            })
            ->select(DB::raw('DISTINCT h.id'), 'jam_masuk', 'jam_pulang')
            ->orderBy('h.id');
    }
}
