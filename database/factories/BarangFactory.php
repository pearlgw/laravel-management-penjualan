<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
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
        $kodeBarang = 'BRG' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_barang' => $kodeBarang,
            'nama' => $this->faker->name(),
            'harga_beli' => mt_rand(10000, 50000),
            'harga_jual' => mt_rand(15000, 75000),
            'id_jenis_barang' => mt_rand(1, 3),
            'id_pemasok' => mt_rand(1, 10),
        ];
    }
}
