@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pemasok</h1>
    </div>
    <form action="/pemasok" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="kode_pemasok" class="form-label">Kode Pemasok</label>
            <input type="text" name="kode_pemasok" class="form-control @error('kode_pemasok') is-invalid @enderror" id="kode_pemasok"
                value="{{ old('kode_pemasok') }}" required>
            @error('kode_pemasok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemasok</label>
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
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                id="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pemasok</button>
    </form>

@endsection
