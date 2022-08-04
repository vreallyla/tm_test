<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPoli extends Model
{
    use HasFactory;

    protected $table='m_poli';


    protected $fillable=[
        'nama','kode'
    ];
}
