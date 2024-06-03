@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Barang</h3>
            <a href="/barang/create" class="btn btn-success d-block">Tambah Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Pemasok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Waktu Buat</th>
                            <th>Waktu Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_barang }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jenisBarang->kategori_barang }}</td>
                                <td>{{ $data->RRpemasok->nama }}</td>
                                <td>Rp {{ number_format($data->harga_beli, 2, ',', '.') }}</td>
                                <td>Rp {{ number_format($data->harga_jual, 2, ',', '.') }}</td>
                                {{-- <td>
                                    {{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td> --}}
                                <td style="vertical-align: middle;">
                                    <div style="display: flex; align-items: center;">
                                        <a href="/barang/{{ $data->id }}/edit" class="btn btn-warning text-dark mb-1"
                                            style="flex: 1;">
                                            <div style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit ml-1"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <form action="/barang/{{ $data->id }}" method="POST" class="d-inline"
                                            style="flex: 1;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger border-0"
                                                onclick="return confirm('Yakin hapus data pemasok ini?')"
                                                style="width: 100%;">
                                                <div style="display: flex; align-items: center; justify-content: center;">
                                                    Delete
                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
