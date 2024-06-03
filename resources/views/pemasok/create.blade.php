@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/pemasok" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Pemasok</h1>
                </div>
                <div class="card-body">
                    <form action="/pemasok" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_pemasok" class="form-label">Kode Pemasok</label>
                            <input type="text" name="kode_pemasok"
                                class="form-control @error('kode_pemasok') is-invalid @enderror" id="kode_pemasok"
                                value="{{ old('kode_pemasok') }}" required>
                            @error('kode_pemasok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pemasok</label>
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
                        <button type="submit" class="btn btn-success">Tambah Pemasok</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
