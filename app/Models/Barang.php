<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'kode_barang',
    //     'id_jenis_barang',
    //     'id_pemasok',
    //     'id_gudang',
    //     'nama',
    //     'harga_beli',
    //     'harga_jual',
    //     'stok'
    // ];

    protected $guarded = ['id'];

    public function stokGudang()
    {
        return $this->hasMany(DetailStokGudang::class, 'barang_id');
    }

    public function stokGudangs()
    {
        return $this->hasMany(StokGudang::class, 'barang_id');
    }

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }

    public function Rgudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function Rtoko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
    public function Rstoktoko()
    {
        return $this->hasOne(StokToko::class, 'id_stok_toko');
    }

    public function RRpemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }

    public function Rbarang()
    {
        return $this->hasMany(Barang::class);
    }

    public function totalStokGudang()
    {
        return $this->hasMany(TotalStokGudang::class, 'barang_id');
    }

    public function totalStokToko()
    {
        return $this->hasMany(TotalStokToko::class, 'barang_id');
    }
}
