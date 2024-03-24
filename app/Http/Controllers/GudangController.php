<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gudang.index', [
            'title' => 'Gudang',
            'user' => auth()->user()->name,
            'gudang' => Gudang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gudang.create', [
            'title' => 'Form Gudang',
            'user' => auth()->user()->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_gudang' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        Gudang::create($validatedData);

        return redirect('/gudang')->with('success', 'Berhasil Menambahkan gudang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('gudang.edit', [
            'title' => 'Edit Barang',
            'user' => auth()->user()->name,
            'gudang' => Gudang::find($id),
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
        ];

        // Update data gudang
        Gudang::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/gudang')->with('success', 'Berhasil Update Gudang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gudang::destroy($id);
        return redirect('/gudang')->with('success', 'Data Telah Dihapus');
    }
}
