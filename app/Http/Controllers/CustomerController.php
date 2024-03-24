<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Role;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index', [
            'title' => 'Customer',
            'user' => auth()->user()->name,
            'customer' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create', [
            'title' => 'Form Customer',
            'user' => auth()->user()->name,
            'role' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_customer' => 'required',
            'nama' => 'required',
            'no_telepon' => 'required',
            'role_id' => 'required',
        ]);

        Customer::create($validatedData);

        return redirect('/customer')->with('success', 'Berhasil Menambahkan Customer');
    }
}
