<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokGudang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailstokgudang()
    {
        return $this->hasMany(DetailStokGudang::class, 'stokgudang_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}
