<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hari::insert([
            [
                'kode' => 'Sn',
                'nama' => 'Senin'
            ],
            [
                'kode' => 'Sl',
                'nama' => 'Selasa'
            ],
            [
                'kode' => 'Rb',
                'nama' => 'Rabu'
            ],
            [
                'kode' => 'Km',
                'nama' => 'Kamis'
            ],
            [
                'kode' => 'Jm',
                'nama' => 'Jum\'at'
            ],
            [
                'kode' => 'Sb',
                'nama' => 'Sabtu'
            ],
            [
                'kode' => 'Mg',
                'nama' => 'Minggu'
            ],
        ]);
    }
}
