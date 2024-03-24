@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Total Barang di Gudang</h3>
        </div>
        <div class="card-body">
            @foreach ($totalstokgudang as $data)
                <a href="/total-stok-gudang/{{ $data->gudang->id }}" class="btn btn-primary">{{ $data->gudang->nama }}</a>
            @endforeach
        </div>
    </div>
@endsection
