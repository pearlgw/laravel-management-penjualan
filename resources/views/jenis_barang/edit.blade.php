@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/jenis_barang" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Edit Jenis Barang</h1>
                </div>
                <div class="card-body">
                    <form action="/jenis_barang/{{ $jenis_barang->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $jenis_barang->id }}">
                        <div class="mb-3">
                            <label for="kategori_barang" class="form-label">Kategori Barang</label>
                            <input type="text" name="kategori_barang"
                                class="form-control @error('kategori_barang') is-invalid @enderror" id="kategori_barang"
                                value="{{ old('kategori_barang', $jenis_barang->kategori_barang) }}">
                            @error('kategori_barang')
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
