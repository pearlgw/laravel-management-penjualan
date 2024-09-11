<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Gudang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
=======
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gudang>
>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
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
<<<<<<< HEAD
        static $increment = 10001;

        $kode_gudang = 'GDNG' . $increment;
        $increment++;

        // static $increment = 0;

        // $increment++;
        // $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_gudang' => $kode_gudang,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
=======
        static $increment = 0;

        $increment++;
        $kodeGudang = 'GDNG' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_gudang' => $kodeGudang,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),

>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
        ];
    }
}
