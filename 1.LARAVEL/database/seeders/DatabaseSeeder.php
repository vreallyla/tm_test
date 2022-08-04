<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MPoli;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'nama' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            HariSeeder::class,
            JobDescSeeder::class,
            MPoliSeeder::class,


            // dummy
            MPegawaiSeeder::class,
            MJadwalSeeder::class,
        ]);
    }
}
