<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ibu>
 */
class IbuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik_ibu' => $this->faker->numberBetween(350000000000, 359999999999),
            'nama_ibu' => $this->faker->name('female'),
            'alamat_ibu' => $this->faker->address,
            'tgl_lahir_ibu' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
