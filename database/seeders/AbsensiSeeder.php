<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Absensi::factory(10)->create();
    }
}
