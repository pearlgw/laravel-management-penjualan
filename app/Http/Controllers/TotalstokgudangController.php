<?php

namespace App\Http\Controllers;

use App\Models\TotalStokGudang;
use Illuminate\Http\Request;

class TotalstokgudangController extends Controller
{
    public function index()
    {
        return view('totalstokgudang.index', [
            'title' => 'Total Stok Gudang',
            'user' => auth()->user()->name,
            'totalstokgudang' => TotalStokGudang::select('gudang_id')->distinct()->get(),
        ]);
    }

    public function databarang($id)
    {
        return view('totalstokgudang.databaranggudang', [
            'title' => 'Total Stok Gudang',
            'user' => auth()->user()->name,
            'totalstokgudang' => TotalStokGudang::where('gudang_id', $id)->get(),
        ]);
    }
}
