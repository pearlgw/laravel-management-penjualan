<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisBarang>
 */
class JenisBarangFactory extends Factory
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
        $kodeJenisBarang = 'JNBRG' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_jenis_barang' => $kodeJenisBarang,
            'jenis_barang' => $this->faker->randomElement(['Makanan', 'Minuman', 'Snack']),
        ];
    }
}
