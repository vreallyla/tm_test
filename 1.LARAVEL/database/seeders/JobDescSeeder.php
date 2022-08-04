<?php

namespace Database\Seeders;

use App\Models\JobDesc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobDescSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobDesc::insert([
            [
                'kode' => 'DR',
                'nama' => 'Dokter'
            ],
            [
                'kode' => 'OT',
                'nama' => 'Lainnya'
            ],
        ]);
    }
}
