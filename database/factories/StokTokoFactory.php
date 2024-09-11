<?php

namespace Database\Factories;

use App\Models\Gudang;
use App\Models\Toko;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
 */
class StokTokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $increment = 10001;

        $kode_suratjalan = 'SRJLN' . $increment;
        $increment++;

        // static $increment = 0;

        // $increment++;
        // $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_suratjalan' => $kode_suratjalan,
            'user_id' => mt_rand(1, 10),
            'toko_id' => mt_rand(1, 6),
        ];
    }
}
