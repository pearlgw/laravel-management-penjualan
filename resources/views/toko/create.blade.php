@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Toko</h1>
    </div>
    <form action="/toko" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="kode_toko" class="form-label">Kode Toko</label>
            <input type="text" name="kode_toko" class="form-control @error('kode_toko') is-invalid @enderror" id="kode_toko"
                value="{{ old('kode_toko') }}" required>
            @error('kode_toko')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Toko</label>
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
        <button type="submit" class="btn btn-primary">Tambah Toko</button>
    </form>

@endsection
