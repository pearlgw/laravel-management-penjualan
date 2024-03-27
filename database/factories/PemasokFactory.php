<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
 */
class PemasokFactory extends Factory
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
        $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_pemasok' => $kodePemasok,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_telp' => '+62' . $this->faker->numberBetween(100000000, 999999999)
        ];
    }
}
