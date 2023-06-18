<?php

namespace Database\Factories;

use App\Models\KerjaPraktek;
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
            // 'user_id' => KerjaPraktek::factory()->create()->user_id,
            'admin_id' => Pembina::factory()->create()->admin_id,
            'kerja_praktek_id' => KerjaPraktek::factory()->create()->id,
            'nilai_sopan_santun' => $this->faker->numberBetween(0, 100), 
            'nilai_dedikasi' => $this->faker->numberBetween(0, 100), 
            'nilai_presensi_kehadiran' => $this->faker->numberBetween(0, 100), 
            'nilai_tanggung_jawab' => $this->faker->numberBetween(0, 100), 
            'nilai_kemampuan_bekerjasama' => $this->faker->numberBetween(0, 100), 
            'nilai_prakarsa' => $this->faker->numberBetween(0, 100), 
            'nilai_skill' => $this->faker->numberBetween(0, 100), 
            'nilai' => $this->faker->numberBetween(0, 100), 
            'keterangan' => $this->faker->paragraph(2) ,
        ];
    }
}
