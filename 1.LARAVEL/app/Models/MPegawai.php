<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPegawai extends Model
{
    use HasFactory;

    protected $table = 'm_pegawai';

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
            if (!self::where('no_pegawai', $code . str()->padLeft($index, 3, '0') .'-'. $job_desc->kode)->first())
                break;
        }

        return $code . str()->padLeft($index, 3, '0') .'-'. $job_desc->kode;
    }
}
