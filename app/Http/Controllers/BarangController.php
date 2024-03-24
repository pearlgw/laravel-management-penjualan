<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\JenisBarang;
use App\Models\Pemasok;
use App\Models\StokGudang;
use App\Models\StokToko;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index(): View
    {
        return view('barang.index', [
            'title' => 'Gudang',
            'user' => auth()->user()->name,
            'barang' => Barang::all(),
        ]);
    }

    public function create()
    {
        return view('barang.create', [
            'title' => 'Tambah Barang',
            'user' => auth()->user()->name,
            'jenis_barang' => JenisBarang::all(),
            'pemasok' => Pemasok::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'id_jenis_barang' => 'required',
            'id_pemasok' => 'required',
        ]);

        Barang::create($validatedData);

        return redirect('/barang')->with('success', 'Berhasil Menambahkan Barang');
    }

    public function edit(string $id)
    {
        return view('barang.edit', [
            'title' => 'Edit Barang',
            'user' => auth()->user()->name,
            'barang' => Barang::find($id),
            'jenis_barang' => JenisBarang::all(),
            'pemasok' => Pemasok::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // Ambil data dari permintaan
        $dataToUpdate = [
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'id_jenis_barang' => $request->id_jenis_barang,
            'id_pemasok' => $request->id_pemasok,
        ];

        // Update data barang
        Barang::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/barang')->with('success', 'Berhasil Update Barang');

    }

    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Data Telah Dihapus');
    }
}
