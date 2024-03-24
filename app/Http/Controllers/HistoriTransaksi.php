<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoriTransaksi extends Controller
{
    public function index()
    {
        return view('transaksi.index', [
            'title' => 'Transaksi',
            'user' => auth()->user()->name,
            'transaksi' => Transaksi::all(),
        ]);
    }
}
