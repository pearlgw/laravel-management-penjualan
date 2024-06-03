<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gudang>
 */
class GudangFactory extends Factory
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
        $kodeGudang = 'GDNG' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_gudang' => $kodeGudang,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),

        ];
    }
}
