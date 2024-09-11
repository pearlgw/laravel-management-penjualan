<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Gudang;
use App\Models\Toko;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
=======
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
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
<<<<<<< HEAD
        static $increment = 10001;

        $kode_toko = 'TK' . $increment;
        $increment++;

        // static $increment = 0;

        // $increment++;
        // $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_toko' => $kode_toko,
=======
        static $increment = 0;

        $increment++;
        $kodeToko = 'TK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_toko' => $kodeToko,
>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
        ];
    }
}
