<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PembinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pembina::factory(5)->create(); 

    }
}
