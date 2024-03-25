@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Jenis Barang</h1>
    </div>
    <form action="/jenis_barang" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="kode_jenis_barang" class="form-label">Kode Jenis Barang</label>
            <input type="text" name="kode_jenis_barang" class="form-control" id="kode_jenis_barang"
                value="{{ $kode_jenis_barang }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="kategori_barang" class="form-label">Kategori Barang</label>
            <input type="text" name="kategori_barang" class="form-control @error('kategori_barang') is-invalid @enderror" id="kategori_barang"
                value="{{ old('kategori_barang') }}" required>
            @error('kategori_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pemasok</button>
    </form>

@endsection
