<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
 */
class TokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $increment = 0;

        $increment++;
        $kodeToko = 'TK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_toko' => $kodeToko,
            'nama' => $this->faker->firstName(),
            'alamat' => $this->faker->address(),
        ];
    }
}
