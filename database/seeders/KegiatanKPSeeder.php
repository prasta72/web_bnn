<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KegiatanKPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kegiatan::factory(10)->create();
    }
}
