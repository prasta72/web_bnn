<?php

namespace Database\Factories;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KerjaPraktekFactory extends Factory
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
            'pembina_id' => Pembina::factory()->create()->id,
            'NIM' => $this->faker->randomNumber(8, true),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber() ,
            'instansi' =>  $this->faker->company(),
            'jurusan' =>  $this->faker->company(),
            'mulai_kerja_praktek' =>  $this->faker->dateTime(),
            'selesai_kerja_praktek' =>  $this->faker->dateTime(),
            'status' =>  'aktif', 
            'bidang_kerja' =>  $this->faker->company(),

        ];
    }
}
