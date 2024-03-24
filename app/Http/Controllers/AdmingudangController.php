<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmingudangController extends Controller
{
    public function index() {
        return view('admingudang.index', [
            'title' => 'Home',
            'user' => auth()->user()->name
        ]);
    }
}
