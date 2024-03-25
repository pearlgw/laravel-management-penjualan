<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'title' => 'User',
            'user' => auth()->user()->name,
            'user1' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cek = User::count();
        if($cek == 0){
            $urut = 1001;
            $kode_user = 'USR' . $urut;
        }else{
            $ambil = User::all()->last();
            $urut = (int)substr($ambil->kode_user, - 4) + 1;
            $kode_user = 'USR' . $urut;
        }
        return view('user.create', [
            'title' => 'Form User',
            'user' => auth()->user()->name,
            'role' => Role::all(),
            'kode_user' => $kode_user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_user' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        User::create($validatedData);

        return redirect('/user')->with('success', 'Berhasil Menambahkan User');
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
        return view('user.edit', [
            'title' => 'Edit User',
            'user' => auth()->user()->name,
            'user1' => User::find($id),
            'role' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data dari permintaan
        $dataToUpdate = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];

        // Update data gudang
        User::where('id', $id)->update($dataToUpdate);

        // Redirect kembali dengan pesan sukses
        return redirect('/user')->with('success', 'Berhasil Update User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/user')->with('success', 'Data Telah Dihapus');
    }
}
