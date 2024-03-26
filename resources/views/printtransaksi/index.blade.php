<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Download Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .container-fluid {
            border-bottom: 2px solid black;
            font-size: 15px;
        }

        .table-bordered {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid black;
        }

        .alamat {
            text-align: center;
            margin-bottom: 10px;
        }

        .no_telp {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .ttd-container {
            margin-top: 50px;
            width: 30%;
            display: flex;
            float: right;
        }

        .ttd-nama {
            font-weight: bold;
        }

        .ttd-tulisan {
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <div class="container-fluid clearfix">
        <div class="header">
            <div class="judul">
                <h3 class="text-center">Toko Al-Fatihah</h3>
            </div>
            <div class="alamat">
                {{ $transaksi->user->toko->alamat }}
            </div>
        </div>
        <table style="font-size: 15px;">
            <tr>
                <td>
                    <p>Kode Transaksi</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->kode_transaksi }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Toko</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->user->toko->nama }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nama Kasir</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->user->name }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Waktu Transaksi</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ \Carbon\Carbon::parse($transaksi->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Total Harga</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->harga_total }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Uang Pembayaran</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->uang_pembayaran }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Uang Kembalian</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $transaksi->uang_kembalian }}</p>
                </td>
            </tr>
        </table>
        <h4 class="mt-3">Detail Barang</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php
                        $no = 1;
                    @endphp
                    <td>{{ $no++; }}</td>
                    <td>{{ $transaksi->detailtransaksi[0]->totalstoktoko->totalStokGudang->barang->nama }}</td>
                    <td>{{ $transaksi->detailtransaksi[0]->jumlah }}</td>
                    <td>{{ $transaksi->detailtransaksi[0]->total }}</td>
                </tr>
            </tbody>
        </table>

        <p class="text-center">Terima Kasih</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
