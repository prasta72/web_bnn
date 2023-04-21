<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class kegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'bidang_kerja' =>  $this->faker->company(),
            'waktu' => $this->faker->dateTime(),
            'kegiatan' =>  $this->faker->company(),
            'status' =>  'belum selesai',
        ];
    }
}
