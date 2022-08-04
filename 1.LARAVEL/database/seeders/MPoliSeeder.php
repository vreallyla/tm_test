<?php

namespace Database\Seeders;

use App\Models\MPoli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MPoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MPoli::insert([
            [
                'kode'=>'PG',
                'nama'=>'Poli Gigi',
            ],
            [
                'kode'=>'PM',
                'nama'=>'Poli Mata',
            ],
            [
                'kode'=>'PK',
                'nama'=>'Poli Kandunga',
            ],
            [
                'kode'=>'PPD',
                'nama'=>'Poli Penyakit Dalam',
            ],
        ]);
    }
}
