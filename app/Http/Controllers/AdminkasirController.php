<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminkasirController extends Controller
{
    public function index() {
        return view('adminkasir.index', [
            'title' => 'Home',
            'user' => auth()->user()->name,
            'toko' => Auth::user()->toko
        ]);
    }
}
