<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->unique()->word(),
            // 'user_id' => $this->faker->numberBetween(1, 2),
            'kategori_id' => $this->faker->numberBetween(1, 6),
            // 'pesan_id' => $this->faker->numberBetween(1, 10),
            'unit_id' => $this->faker->numberBetween(1, 3),
            'berat' => $this->faker->randomDigit(),
            'harga' => $this->faker->randomFloat()
        ];
    }
}
