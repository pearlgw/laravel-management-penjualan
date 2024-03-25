<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('toko.index', [
            'title' => 'Toko',
            'user' => auth()->user()->name,
            'toko' => Toko::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cek = Toko::count();
        if($cek == 0){
            $urut = 10001;
            $kode_toko = 'TK' . $urut;
        }else{
            $ambil = Toko::all()->last();
            $urut = (int)substr($ambil->kode_toko, - 5) + 1;
            $kode_toko = 'TK' . $urut;
        }

        return view('toko.create', [
            'title' => 'Form Toko',
            'user' => auth()->user()->name,
            'kode_toko' => $kode_toko
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_toko' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        Toko::create($validatedData);

        return redirect('/toko')->with('success', 'Berhasil Menambahkan Toko');
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
        return view('toko.edit', [
            'title' => 'Edit Barang',
            'user' => auth()->user()->name,
            'toko' => Toko::find($id),
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
        Toko::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/toko')->with('success', 'Berhasil Update Toko');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Toko::destroy($id);
        return redirect('/toko')->with('success', 'Data Telah Dihapus');
    }
}
