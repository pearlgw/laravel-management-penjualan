<?php

namespace App\Http\Controllers;

use App\Models\DetailStokToko;
use App\Models\StokToko;
use App\Models\Toko;
use App\Models\TotalStokGudang;
use App\Models\TotalStokToko;
use Illuminate\Http\Request;

class DetailstoktokoController extends Controller
{
    public function index()
    {
        return view('stoktoko.index', [
            'title' => 'Total Stok Gudang',
            'user' => auth()->user()->name,
            'detailstoktoko' => StokToko::with('detailStokToko')->get(),
        ]);
    }

    public function create()
    {
        $cek = StokToko::count();
        if($cek == 0){
            $urut = 10001;
            $kode_suratjalan = 'SRJLN' . $urut;
        }else{
            $ambil = StokToko::all()->last();
            $urut = (int)substr($ambil->kode_suratjalan, - 5) + 1;
            $kode_suratjalan = 'SRJLN' . $urut;
        }

        return view('stoktoko.create', [
            'title' => 'Form Detail Stok Toko',
            'user' => auth()->user()->name,
            'totalstokgudang' => TotalStokGudang::all(),
            'toko' => Toko::all(),
            'kode_suratjalan' => $kode_suratjalan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_suratjalan' => 'required',
            'toko_id' => 'required|exists:tokos,id',
            'barang_id.*' => 'required',
            'stok.*' => 'required|numeric|min:0'
        ]);

        // Simpan data ke tabel StokToko
        $stokToko = StokToko::create([
            'kode_suratjalan' => $request->kode_suratjalan,
            'toko_id' => $request->toko_id
        ]);

        foreach ($request->barang_id as $key => $barang_id) {
            // Simpan detail stok ke tabel DetailStokToko
            DetailStokToko::create([
                'stoktoko_id' => $stokToko->id,
                'barang_id' => $barang_id,
                'stok' => $request->stok[$key]
            ]);

            // Periksa apakah sudah ada entri di TotalStokToko
            $totalStokToko = TotalStokToko::where('barang_id', $barang_id)
                ->where('toko_id', $request->toko_id)
                ->first();

            // Jika sudah ada, update total stoknya
            if ($totalStokToko) {
                $totalStokToko->total_stok += $request->stok[$key];
                $totalStokToko->save();
            } else {
                // Jika belum ada, buat entri baru
                TotalStokToko::create([
                    'barang_id' => $barang_id,
                    'toko_id' => $request->toko_id,
                    'total_stok' => $request->stok[$key]
                ]);
            }

            // Kurangi total stok di TotalStokGudang
            TotalStokGudang::where('barang_id', $barang_id)
                ->decrement('total_stok', $request->stok[$key]);
        }

        return redirect('/detail-stok-toko')->with('success', 'Berhasil menyimpan data stok toko');
    }
}
