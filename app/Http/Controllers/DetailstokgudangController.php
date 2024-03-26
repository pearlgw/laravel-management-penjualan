<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailStokGudang;
use App\Models\Gudang;
use App\Models\StokGudang;
use App\Models\TotalStokGudang;
use Illuminate\Http\Request;

class DetailstokgudangController extends Controller
{
    public function index()
    {
        return view('stokgudang.index', [
            'title' => 'Stok Gudang',
            'user' => auth()->user()->name,
            'stok_gudang' => StokGudang::all(),
        ]);
    }

    public function create()
    {
        return view('stokgudang.create', [
            'title' => 'Form Detail Stok gudang',
            'user' => auth()->user()->name,
            'gudang' => Gudang::all(),
            'barang' => Barang::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gudang_id' => 'required|exists:gudangs,id',
            'user_id' => 'required',
            'barang_id.*' => 'required|exists:barangs,id',
            'stok.*' => 'required|numeric|min:0'
        ]);

        // Simpan data ke tabel StokGudang
        $stokGudang = StokGudang::create([
            'gudang_id' => $request->gudang_id,
            'user_id' => $request->user_id
        ]);

        foreach ($request->barang_id as $key => $barang_id) {
            // Cari atau buat entri di TotalStokGudang
            $totalStok = TotalStokGudang::firstOrNew([
                'gudang_id' => $request->gudang_id,
                'barang_id' => $barang_id
            ]);

            // Tingkatkan total stok jika sudah ada, buat baru jika belum
            $totalStok->total_stok += $request->stok[$key];
            $totalStok->save();

            // Simpan detail stok ke tabel DetailStokGudang
            DetailStokGudang::create([
                'stokgudang_id' => $stokGudang->id,
                'barang_id' => $barang_id,
                'stok' => $request->stok[$key]
            ]);
        }

        return redirect('/detail-stok-gudang')->with('success', 'Berhasil menyimpan data stok gudang');
    }

}
