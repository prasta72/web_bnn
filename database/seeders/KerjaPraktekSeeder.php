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
        \App\Models\kerjaPraktek::factory(7)->create();
    }
}
