@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Barang</h1>
    </div>
    <form action="/barang/{{ $barang->id }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $barang->id }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $barang->nama) }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" value="{{ old('harga_beli', $barang->harga_beli) }}">
            @error('harga_beli')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_jual" class="form-label">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" value="{{ old('harga_jual', $barang->harga_jual) }}">
            @error('harga_jual')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_jenis_barang" class="form-label">Jenis Barang</label>
            <select class="form-control" id="id_jenis_barang" name="id_jenis_barang" required>
                @foreach ($jenis_barang as $data)
                    <option value="{{ old('id_jenis_barang', $data->id) }}">{{ $data->kategori_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pemasok" class="form-label">Pemasok</label>
            <select class="form-control" id="id_pemasok" name="id_pemasok" required>
                @foreach ($pemasok as $data)
                    <option value="{{ old('id_pemasok', $data->id) }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>

@endsection

