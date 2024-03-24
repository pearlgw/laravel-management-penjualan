<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailTransaksi;
use App\Models\TotalStokToko;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index', [
            'title' => 'Transaksi',
            'user' => auth()->user()->name,
            'transaksi' => Transaksi::all(),
        ]);
    }

    public function create()
    {
        // Ambil ID toko dari pengguna yang saat ini masuk
        $tokoId = auth()->user()->toko_id;

        // Ambil total stok toko yang sesuai dengan ID toko pengguna
        $totalStokToko = TotalStokToko::where('toko_id', $tokoId)->get();

        return view('transaksi.create', [
            'title' => 'Form Transaksi',
            'user' => auth()->user()->name,
            'totalstoktoko' => $totalStokToko,
            'customer' => Customer::all(),
        ]);
    }


    public function store(Request $request)
    {
        // Validasi data transaksi
        $validatedData = $request->validate([
            'kode_transaksi' => 'required',
            'user_id' => 'required',
            'customer_id' => 'nullable|integer',
            'harga_total' => 'required',
            'uang_pembayaran' => 'required',
            'uang_kembalian' => 'required',
            'barangtoko_id.*' => 'required',
            'jumlah.*' => 'required',
            'total.*' => 'required',
        ]);

        // Simpan data transaksi
        $transaksi = Transaksi::create($validatedData);

        // Simpan detail transaksi dan kurangi stok barang
        $barangtoko_ids = $request->barangtoko_id;
        $jumlahs = $request->jumlah;
        $totals = $request->total;

        foreach ($barangtoko_ids as $key => $barangtoko_id) {
            // Simpan detail transaksi
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'barangtoko_id' => $barangtoko_id,
                'jumlah' => $jumlahs[$key],
                'total' => $totals[$key],
            ]);

            // Kurangi stok barang
            $totalStok = TotalStokToko::find($barangtoko_id);
            $totalStok->total_stok -= $jumlahs[$key];
            $totalStok->save();
        }

        return redirect('/transaksi')->with('success', 'Berhasil Melakukan Transaksi');
    }
}
