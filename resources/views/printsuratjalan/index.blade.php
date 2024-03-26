<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Download Form Surat Jalan</title>
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
                <h3 class="text-center">Surat Jalan Barang</h3>
            </div>
            <div class="alamat">
                {{ $stoktoko->toko->alamat }}
            </div>
        </div>
        <table style="font-size: 15px;">
            <tr>
                <td>
                    <p>Kode Surat Jalan</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $stoktoko->kode_suratjalan }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Toko Tujuan</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $stoktoko->toko->nama }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nama Pengirim</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ $stoktoko->user->name }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Waktu Input</p>
                </td>
                <td>
                    <p class="ms-3">:</p>
                </td>
                <td>
                    <p>{{ \Carbon\Carbon::parse($stoktoko->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}</p>
                </td>
            </tr>
        </table>
        <h4 class="mt-3">Detail Surat Jalan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stoktoko->detailStokToko as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->barang->barang->nama }}</td>
                        <td>{{ $detail->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="ttd-container clearfix">
            <div class="ttd-nama">
                <p class="text-center">Penanggung Jawab</p>
            </div>
            <div class="ttd-tulisan">
                <p class="text-center">{{ $stoktoko->user->name }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
