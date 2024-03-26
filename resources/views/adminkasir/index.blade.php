@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <h5>Selamat Datang di Toko {{ $toko->nama }}</h5>
    </div>
@endsection
