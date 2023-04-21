<?php

namespace Database\Factories;

use App\Models\kerjaPraktek;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kerjapraktek_id' => KerjaPraktek::factory()->create()->id,
            'waktu' => $this->faker->dateTime(),
            'kehadiran' => 'hadir' ,
            'status' =>  '-',
        ];
    }
}
