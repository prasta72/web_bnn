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
        \App\Models\kegiatan::factory(10)->create();
    }
}
