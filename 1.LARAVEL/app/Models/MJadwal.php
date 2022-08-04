<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJadwal extends Model
{
    use HasFactory;

    protected $table = 'm_jadwal';

    protected $fillable = [
        'm_pegawai_id',
        'hari_id',
        'jam_masuk',
        'jam_pulang',
    ];
}
