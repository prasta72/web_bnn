<?php

namespace Database\Factories;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
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
            'admin_id' => Pembina::factory()->create()->admin_id,
            'nilai' => $this->faker->numberBetween(0, 100),
            'keterangan' => $this->faker->paragraph(2) ,
        ];
    }
}
