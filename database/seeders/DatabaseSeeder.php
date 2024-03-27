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
            'kode_user' => 'USR1001',
            'name' => 'admin',
            'alamat' => 'yogya',
            'no_telepon' => '089728282929',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::create([
            'kode_user' => 'USR1002',
            'name' => 'admingudang',
            'alamat' => 'bantul',
            'no_telepon' => '089728282929',
            'email' => 'admingudang@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'kode_user' => 'USR1003',
            'name' => 'adminkasir',
            'alamat' => 'sleman',
            'no_telepon' => '089728282929',
            'email' => 'adminkasir@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'toko_id' => 1,
        ]);

        User::create([
            'kode_user' => 'USR1004',
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
            'kategori_barang' => 'Makanan',
        ]);

        JenisBarang::create([
            'kode_jenis_barang' => 'JNBRG10002',
            'kategori_barang' => 'Minuman',
        ]);

        JenisBarang::create([
            'kode_jenis_barang' => 'JNBRG10003',
            'kategori_barang' => 'Sembako',
        ]);




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




        $this->call([
            TokoSeeder::class,
            PemasokSeeder::class,
            GudangSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
