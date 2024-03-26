@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Barang yang di Toko</h3>
            <a href="/detail-stok-toko/create" class="btn btn-primary d-block">Kirim Barang ke Toko</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Surat Jalan</th>
                            <th>Nama Pegawai</th>
                            <th>Toko Tujuan</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stoktoko as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_suratjalan }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->toko->nama }}</td>
                                <td>
                                    @foreach ($data->detailStokToko as $detail)
                                        {{ $detail->barang->barang->nama }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->detailStokToko as $detail)
                                        {{ $detail->stok }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    <p>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}</p>
                                </td>
                                <td>
                                    <a href="/surat-jalan/{{ $data->id }}" target="_blank" class="btn btn-primary">Cetak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
