@extends('dashboard.layouts.main')

@section('thisContent')
    <a href="/detail-stok-toko" class="btn btn-warning text-dark mb-2"><i class="bi bi-arrow-left-circle"></i>
        Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Barang ke Toko</h1>
                </div>
                <div class="card-body">
                    <form action="/detail-stok-toko" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_suratjalan" class="form-label">Kode Surat Jalan</label>
                            <input type="text" name="kode_suratjalan"
                                class="form-control @error('kode_suratjalan') is-invalid @enderror" id="kode_suratjalan"
                                value="{{ old('kode_suratjalan') }}" required>
                            @error('kode_suratjalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="toko_id" class="form-label">Toko Tujuan</label>
                            <select class="form-control" id="toko_id" name="toko_id" required>
                                @foreach ($toko as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <table class="table" id="barang-table">
                            <tr>
                                <td>Barang</td>
                                <td>Stok</td>
                                <td>Aksi</td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="barang_id[]" required>
                                        @foreach ($totalstokgudang as $data)
                                            <option value="{{ $data->id }}">{{ $data->barang->nama }} |
                                                {{ $data->gudang->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="stok[]"
                                        class="form-control @error('stok') is-invalid @enderror" required>
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-row">Hapus</button>
                                </td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-success" id="add-row">Tambah List</button>
                        <button type="submit" class="btn btn-primary">Masukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            var table = document.getElementById('barang-table');
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.innerHTML =
                '<select class="form-control" name="barang_id[]" required>@foreach ($totalstokgudang as $data)<option value="{{ $data->id }}">{{ $data->barang->nama }} | | {{ $data->gudang->nama }}</option>@endforeach</select>';
            cell2.innerHTML = '<input type="number" name="stok[]" class="form-control" required>';
            cell3.innerHTML = '<button type="button" class="btn btn-danger remove-row">Hapus</button>';
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                var row = e.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });
    </script>
@endsection
