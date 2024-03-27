@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/toko" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Edit Toko</h1>
                </div>
                <div class="card-body">
                    <form action="/toko/{{ $toko->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $toko->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Toko</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama', $toko->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" value="{{ old('alamat', $toko->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
