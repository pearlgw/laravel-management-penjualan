<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function totalstoktoko()
    {
        return $this->belongsTo(TotalStokToko::class, 'barangtoko_id'); // Ganti sesuai dengan model yang sesuai
    }
}
