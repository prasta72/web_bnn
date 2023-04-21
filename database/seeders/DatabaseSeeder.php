<?php

namespace Database\Seeders;

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
        $this->call([
            AbsensiSeeder::class,
            AdminSeeder::class,
            KegiatanKPSeeder::class,
            KerjaPraktekSeeder::class,
            NilaiSeeder::class,
            PembinaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
