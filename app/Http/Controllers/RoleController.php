<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('role.index', [
            'title' => 'Role',
            'user' => auth()->user()->name,
            'role' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create', [
            'title' => 'Form Role',
            'user' => auth()->user()->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_name' => 'required',
        ]);

        Role::create($validatedData);

        return redirect('/role')->with('success', 'Berhasil Menambahkan Role');
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
        return view('role.edit', [
            'title' => 'Edit Role',
            'user' => auth()->user()->name,
            'role' => Role::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data dari permintaan
        $dataToUpdate = [
            'role_name' => $request->role_name,
        ];

        // Update data gudang
        Role::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/role')->with('success', 'Berhasil Update Role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect('/role')->with('success', 'Data Telah Dihapus');
    }
}
