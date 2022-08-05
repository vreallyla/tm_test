<?php

namespace Database\Seeders;

use App\Models\Hari;
use App\Models\MJadwal;
use App\Models\MPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = MPegawai::where('job_desc_id', 1)
            ->select('id')
            ->get();
        $start = [
            '08',
            '10',
            '13',
            '16'
        ];
        $end = [
            '10',
            '13',
            '16',
            '19',
        ];

        $minute = [
            ':00',
            ':15',
            ':30',
            ':45',
        ];

        foreach ($data as $dt) {
            $index = rand(0, 3);
            $hari = [];
            for ($i = 0; $i < rand(1, 2); $i++) {
                $day = Hari::select('id')->inRandomOrder()
                    ->when(count($hari), fn ($q) => $q->whereNotIn('id',$hari))
                    ->first();
                $hari[] = $day->id;
                MJadwal::create([
                    'm_pegawai_id' => $dt->id,
                    'hari_id' => $day->id,
                    'jam_masuk' => $start[$index] . $minute[$index],
                    'jam_pulang' => $end[$index] . $end[$index],
                ]);
            }
        }
    }
}
