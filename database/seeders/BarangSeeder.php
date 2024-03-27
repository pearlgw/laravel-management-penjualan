<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Barang::factory(10)->create();
    // }

    public function run(): void
    {
        // Data makanan, minuman, dan sembako
        Barang::factory()->createMany([
            // Data makanan
            ['nama' => 'Nasi Putih', 'id_jenis_barang' => 1, 'harga_beli' => 5000, 'harga_jual' => 7000],
            ['nama' => 'Mie Instan', 'id_jenis_barang' => 1, 'harga_beli' => 2000, 'harga_jual' => 3000],
            ['nama' => 'Telur Ayam', 'id_jenis_barang' => 1, 'harga_beli' => 15000, 'harga_jual' => 18000],

            // Data minuman
            ['nama' => 'Air Mineral', 'id_jenis_barang' => 2, 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['nama' => 'Teh Botol', 'id_jenis_barang' => 2, 'harga_beli' => 4000, 'harga_jual' => 6000],
            ['nama' => 'Kopi Sachet', 'id_jenis_barang' => 2, 'harga_beli' => 5000, 'harga_jual' => 8000],

            // Data sembako
            ['nama' => 'Gula Pasir', 'id_jenis_barang' => 3, 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['nama' => 'Minyak Goreng', 'id_jenis_barang' => 3, 'harga_beli' => 15000, 'harga_jual' => 18000],
            ['nama' => 'Beras', 'id_jenis_barang' => 3, 'harga_beli' => 20000, 'harga_jual' => 25000],

            // Data tambahan barang
            ['nama' => 'Garam Beryodium', 'id_jenis_barang' => 3, 'harga_beli' => 5000, 'harga_jual' => 7000],
            ['nama' => 'Susu Kental Manis', 'id_jenis_barang' => 2, 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['nama' => 'Sarden Kaleng', 'id_jenis_barang' => 1, 'harga_beli' => 8000, 'harga_jual' => 10000],
            ['nama' => 'Mie Goreng', 'id_jenis_barang' => 1, 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['nama' => 'Tepung Terigu', 'id_jenis_barang' => 3, 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['nama' => 'Susu Bubuk', 'id_jenis_barang' => 2, 'harga_beli' => 12000, 'harga_jual' => 15000],
            ['nama' => 'Saus Sambal', 'id_jenis_barang' => 3, 'harga_beli' => 5000, 'harga_jual' => 8000],
            ['nama' => 'Sirup', 'id_jenis_barang' => 2, 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['nama' => 'Sarden', 'id_jenis_barang' => 1, 'harga_beli' => 6000, 'harga_jual' => 8000],
            ['nama' => 'Selai', 'id_jenis_barang' => 1, 'harga_beli' => 8000, 'harga_jual' => 10000]
        ]);
    }
}
