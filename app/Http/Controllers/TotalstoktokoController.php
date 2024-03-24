<?php

namespace App\Http\Controllers;

use App\Models\TotalStokToko;
use Illuminate\Http\Request;

class TotalstoktokoController extends Controller
{
    public function index()
    {
        return view('totalstoktoko.index', [
            'title' => 'Total Stok Toko',
            'user' => auth()->user()->name,
            'totalstoktoko' => TotalStokToko::select('toko_id')->distinct()->get(),
        ]);
    }

    public function databarang($id)
    {
        return view('totalstoktoko.databarangtoko', [
            'title' => 'Total Stok Toko',
            'user' => auth()->user()->name,
            'totalstoktoko' => TotalStokToko::where('toko_id', $id)->get(),
        ]);
    }
}
