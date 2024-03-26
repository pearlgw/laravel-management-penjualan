@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Barang ke Gudang</h1>
    </div>
    <form action="/detail-stok-gudang" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="gudang_id" class="form-label">Gudang Tujuan</label>
            <select class="form-control" id="gudang_id" name="gudang_id" required>
                @foreach ($gudang as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Nama Pegawai</label>
            <input type="text" name="user_id_view" id="user_id" class="form-control" value="{{ $user }}" readonly>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
                        @foreach ($barang as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="stok[]" class="form-control @error('stok') is-invalid @enderror"
                        required>
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

    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            var table = document.getElementById('barang-table');
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.innerHTML = '<select class="form-control" name="barang_id[]" required>@foreach ($barang as $data)<option value="{{ $data->id }}">{{ $data->nama }}</option>@endforeach</select>';
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
