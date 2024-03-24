<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenis_barang.index', [
            'title' => 'Gudang',
            'user' => auth()->user()->name,
            'jenis_barang' => JenisBarang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_barang.create', [
            'title' => 'Form Jenis Barang',
            'user' => auth()->user()->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_jenis_barang' => 'required',
            'kategori_barang' => 'required',
        ]);

        JenisBarang::create($validatedData);

        return redirect('/jenis_barang')->with('success', 'Berhasil Menambahkan Jenis Barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('jenis_barang.edit', [
            'title' => 'Edit Jenis Barang',
            'user' => auth()->user()->name,
            'jenis_barang' => JenisBarang::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data dari permintaan
        $dataToUpdate = [
            'kategori_barang' => $request->kategori_barang,
        ];

        // Update data jenis barang
        JenisBarang::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/jenis_barang')->with('success', 'Berhasil Update Jenis barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JenisBarang::destroy($id);
        return redirect('/jenis_barang')->with('success', 'Data Telah Dihapus');
    }
}
