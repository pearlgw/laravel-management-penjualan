<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gudang::factory(5)->create();
        Gudang::factory()->createMany([
            ['kode_gudang' => 'GDNG10001', 'nama' => 'Gudang A', 'alamat' => 'Semarang'],
            ['kode_gudang' => 'GDNG10002', 'nama' => 'Gudang B', 'alamat' => 'Jogja'],
            ['kode_gudang' => 'GDNG10003', 'nama' => 'Gudang C', 'alamat' => 'Bogor'],
            ['kode_gudang' => 'GDNG10004', 'nama' => 'Gudang D', 'alamat' => 'Jakarta'],
            ['kode_gudang' => 'GDNG10005', 'nama' => 'Gudang E', 'alamat' => 'Surabaya'],
        ]);
    }
}
