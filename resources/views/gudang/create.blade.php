@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Gudang</h1>
    </div>
    <form action="/gudang" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="kode_gudang" class="form-label">Kode Gudang</label>
            <input type="text" name="kode_gudang" class="form-control" id="kode_gudang"
                value="{{ $kode_gudang }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Gudang</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                id="alamat" value="{{ old('alamat') }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Gudang</button>
    </form>

@endsection
