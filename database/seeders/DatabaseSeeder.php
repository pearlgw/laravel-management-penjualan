<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\JenisBarang;
use App\Models\Pemasok;
use App\Models\Role;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'role_name' => 'superadmin',
        ]);

        Role::create([
            'role_name' => 'admingudang',
        ]);

        Role::create([
            'role_name' => 'adminkasir',
        ]);

        Role::create([
            'role_name' => 'customer',
        ]);

        User::create([
            'kode_user' => 'USR001',
            'name' => 'admin',
            'alamat' => 'yogya',
            'no_telepon' => '089728282929',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::create([
            'kode_user' => 'USR002',
            'name' => 'admingudang',
            'alamat' => 'bantul',
            'no_telepon' => '089728282929',
            'email' => 'admingudang@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'kode_user' => 'USR003',
            'name' => 'adminkasir',
            'alamat' => 'sleman',
            'no_telepon' => '089728282929',
            'email' => 'adminkasir@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'toko_id' => 1,
        ]);

        User::create([
            'kode_user' => 'USR004',
            'name' => 'adminkasir1',
            'alamat' => 'jakarta',
            'no_telepon' => '089728282929',
            'email' => 'adminkasir1@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'toko_id' => 2,
        ]);

        // Seeding Jenis Barang
        JenisBarang::create([
            'kode_jenis_barang' => 'JNBRG10001',
            'kategori_barang' => 'Meja',
        ]);

        JenisBarang::create([
            'kode_jenis_barang' => 'JNBRG10002',
            'kategori_barang' => 'Kursi',
        ]);

        JenisBarang::create([
            'kode_jenis_barang' => 'JNBRG10003',
            'kategori_barang' => 'Lemari',
        ]);

        // // Seeding Pemasok
        // Pemasok::create([
        //     'kode_pemasok' => 'PMSK10001',
        //     'nama' => 'Supri',
        //     'alamat' => 'Jepara',
        //     'no_telp' => '0812345678910',
        // ]);

        // Pemasok::create([
        //     'kode_pemasok' => 'PMSK10002',
        //     'nama' => 'Seno',
        //     'alamat' => 'Semarang',
        //     'no_telp' => '081206789240',
        // ]);

        // // Seeding Gudang
        // Gudang::create([
        //     'kode_gudang' => 'GDNG10001',
        //     'nama' => 'Gudang A',
        //     'alamat' => 'Semarang',
        // ]);

        // Gudang::create([
        //     'kode_gudang' => 'GDNG10002',
        //     'nama' => 'Gudang B',
        //     'alamat' => 'Weleri',
        // ]);

        // Gudang::create([
        //     'kode_gudang' => 'GDNG10003',
        //     'nama' => 'Gudang C',
        //     'alamat' => 'Ambarawa',
        // ]);

        // // Seeding Toko
        // Toko::create([
        //     'kode_toko' => 'TK10001',
        //     'nama' => 'Jati Atos',
        //     'alamat' => 'Weleri',
        // ]);
        // Toko::create([
        //     'kode_toko' => 'TK10002',
        //     'nama' => 'Maju Mapan',
        //     'alamat' => 'Tembalang',
        // ]);

        // seeding barang
        // Barang::create([
        //     'kode_barang' => 'BRG10001',
        //     'nama' => 'Meja Lipat',
        //     'id_jenis_barang' => 1,
        //     'id_pemasok' => 1,
        //     'harga_beli' => 120000,
        //     'harga_jual' => 150000
        // ]);

        // Barang::create([
        //     'kode_barang' => 'BRG10002',
        //     'nama' => 'Kursi Lipat',
        //     'id_jenis_barang' => 2,
        //     'id_pemasok' => 2,
        //     'harga_beli' => 50000,
        //     'harga_jual' => 100000
        // ]);

        // Barang::create([
        //     'kode_barang' => 'BRG10003',
        //     'nama' => 'Lemari Lipat',
        //     'id_jenis_barang' => 3,
        //     'id_pemasok' => 2,
        //     'harga_beli' => 500000,
        //     'harga_jual' => 650000
        // ]);


        $this->call([
            TokoSeeder::class,
            PemasokSeeder::class,
            GudangSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
