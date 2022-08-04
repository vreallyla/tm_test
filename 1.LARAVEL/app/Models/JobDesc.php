<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDesc extends Model
{
    use HasFactory;

    protected $table='job_desc';


    protected $fillable=[
        'nama','kode'
    ];
}
