@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Transaksi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Pelayan</th>
                            <th>Nama Customer</th>
                            <th>Harga Total</th>
                            <th>Uang Pembayaran</th>
                            <th>Uang Kembalian</th>
                            <th>Barang</th>
                            <th>Jumlah Pembelian</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_transaksi }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->customer->nama ?? '-' }}</td>
                                <td>{{ $data->harga_total }}</td>
                                <td>{{ $data->uang_pembayaran }}</td>
                                <td>{{ $data->uang_kembalian }}</td>
                                <td>
                                    @foreach ($data->detailtransaksi as $detail)
                                        <p>{{ $detail->totalstoktoko->totalStokGudang->barang->nama }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->detailtransaksi as $detail)
                                        <p>{{ $detail->jumlah }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->detailtransaksi as $detail)
                                        <p>{{ $detail->total }}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
