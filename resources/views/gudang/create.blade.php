@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/gudang" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Gudang</h1>
                </div>
                <div class="card-body">
                    <form action="/gudang" method="POST" style="width: 50%">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_gudang" class="form-label">Kode Gudang</label>
                            <input type="text" name="kode_gudang"
                                class="form-control @error('kode_gudang') is-invalid @enderror" id="kode_gudang"
                                value="{{ old('kode_gudang') }}" required>
                            @error('kode_gudang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Gudang</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama') }}" required>
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
                        <button type="submit" class="btn btn-success">Tambah Gudang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
