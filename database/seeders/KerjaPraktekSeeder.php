<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KerjaPraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\KerjaPraktek::factory(5)->create(); 
    }
}
