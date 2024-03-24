<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminkasirController extends Controller
{
    public function index() {
        return view('adminkasir.index', [
            'title' => 'Home',
            'user' => auth()->user()->name
        ]);
    }
}
