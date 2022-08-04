<?php

namespace Database\Seeders;

use App\Helpers\AllFileInDirectoryHelper;
use App\Models\JobDesc;
use App\Models\MPegawai;
use App\Models\MPoli;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $file = new AllFileInDirectoryHelper();

        $men = $file->getFileNamesInPublicDirectory('/mock/avatar/men/');
        $women = $file->getFileNamesInPublicDirectory('/mock/avatar/women/');
        $data = [];

        foreach ($men as $i => $dt) {
            $job = JobDesc::select('id')->inRandomOrder()->first()->id;
            $poli = MPoli::select('id')->inRandomOrder()->first()->id;
            $kode = MPegawai::generateCode($poli, $job);
            MPegawai::create(
                [
                    'job_desc_id' => $job,
                    'm_poli_id' => $poli,
                    'photo' => $dt,
                    'no_pegawai' => $kode,
                    'sip' => rand(1000000, 999999999),
                    'nama' => ($job == 1 ? 'Dr. ' : '') . $faker->firstName('male'),
                    'jenis_kelamin' => 'L',
                    'alamat' => $faker->address(),
                ]
            );
        }

        foreach ($women as $dt) {
            $job = JobDesc::select('id')->inRandomOrder()->first()->id;
            $poli = MPoli::select('id')->inRandomOrder()->first()->id;
            $kode = MPegawai::generateCode($poli, $job);
            MPegawai::create(
                [
                    'job_desc_id' => $job,
                    'm_poli_id' => $poli,
                    'photo' => $dt,
                    'no_pegawai' => $kode,
                    'sip' => rand(1000000, 999999999),
                    'nama' => ($job == 1 ? 'Dr. ' : '') . $faker->firstName('female'),
                    'jenis_kelamin' => 'P',
                    'alamat' => $faker->address(),
                ]
            );
        }
    }
}
