<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokToko extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function detailStokToko()
    {
        return $this->hasMany(DetailStokToko::class, 'stoktoko_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
