@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/barang" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Barang</h1>
                </div>
                <div class="card-body">
                    <form action="/barang" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" name="kode_barang"
                                class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang"
                                value="{{ old('kode_barang') }}" required>
                            @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <input type="number" name="harga_beli"
                                class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli"
                                value="{{ old('harga_beli') }}">
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="number" name="harga_jual"
                                class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                                value="{{ old('harga_jual') }}">
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
                                    <option value="{{ $data->id }}">{{ $data->kategori_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_pemasok" class="form-label">Pemasok</label>
                            <select class="form-control" id="id_pemasok" name="id_pemasok" required>
                                @foreach ($pemasok as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
