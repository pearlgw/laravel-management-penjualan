<?php

namespace App\Http\Controllers;

use App\Models\TotalStokToko;
use Illuminate\Http\Request;

class KetersediaanbarangController extends Controller
{
    public function index()
    {
        return view('ketersediaanbarang.index', [
            'title' => 'Ketersediaan Barang',
            'user' => auth()->user()->name,
            'ketersediaanbarang' => TotalStokToko::where('toko_id', auth()->user()->toko_id)->get(),
        ]);
    }
}
