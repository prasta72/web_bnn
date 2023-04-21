<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PembinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'admin_id' => Admin::factory()->create()->id,
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber() ,
            'bidang_kerja' =>  $this->faker->company(),
            'status' => 'aktif',
        ];
    }
}
