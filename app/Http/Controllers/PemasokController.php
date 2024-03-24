<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pemasok.index', [
            'title' => 'Gudang',
            'user' => auth()->user()->name,
            'pemasok' => Pemasok::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasok.create', [
            'title' => 'Form Pemasok',
            'user' => auth()->user()->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_pemasok' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        Pemasok::create($validatedData);

        return redirect('/pemasok')->with('success', 'Berhasil Menambahkan Pemasok');
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
        return view('pemasok.edit', [
            'title' => 'Edit Barang',
            'user' => auth()->user()->name,
            'pemasok' => Pemasok::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data dari permintaan
        $dataToUpdate = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ];

        // Update data pemasok
        Pemasok::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/pemasok')->with('success', 'Berhasil Update Pemasok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemasok::destroy($id);
        return redirect('/pemasok')->with('success', 'Data Telah Dihapus');
    }
}
