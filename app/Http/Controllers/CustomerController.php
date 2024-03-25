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
        $cek = Customer::count();
        if($cek == 0){
            $urut = 10001;
            $kode_customer = 'CSTM' . $urut;
        }else{
            $ambil = Customer::all()->last();
            $urut = (int)substr($ambil->kode_customer, - 5) + 1;
            $kode_customer = 'CSTM' . $urut;
        }
        return view('customer.create', [
            'title' => 'Form Customer',
            'user' => auth()->user()->name,
            'role' => Role::all(),
            'kode_customer' => $kode_customer
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
