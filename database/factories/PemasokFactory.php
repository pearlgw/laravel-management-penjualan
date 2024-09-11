<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Pemasok;
=======
>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
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
<<<<<<< HEAD
        static $increment = 10001;

        $kode_pemasok = 'PMSK' . $increment;
        $increment++;

        // static $increment = 0;

        // $increment++;
        // $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_pemasok' => $kode_pemasok,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_telp' => '+62' . $this->faker->numberBetween(100000000, 999999999)
=======
        static $increment = 0;

        $increment++;
        $kodePemasok = 'PMSK' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        return [
            'kode_pemasok' => $kodePemasok,
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_telp' => mt_rand(6218, 92826),
>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
        ];
    }
}
