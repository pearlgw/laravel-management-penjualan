@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Transaksi</h1>
    </div>
    <form action="/transaksi" method="POST" style="width: 100%">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
                    <input type="text" name="kode_transaksi"
                        class="form-control" id="kode_transaksi"
                        value="{{ $kode_transaksi }}" required readonly>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelayan</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ auth()->user()->name }}" readonly>
                    <!-- Hidden input to store user ID -->
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Nama Customer</label>
                    <select class="form-control" id="customer_id" name="customer_id">
                        <option value="">Pilih Customer</option>
                        @foreach ($customer as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga_total" class="form-label">Harga Total</label>
                    <input type="text" id="harga_total" name="harga_total" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="uang_pembayaran" class="form-label">Uang Pembayaran</label>
                    <input type="number" name="uang_pembayaran"
                        class="form-control @error('uang_pembayaran') is-invalid @enderror" id="uang_pembayaran"
                        value="{{ old('uang_pembayaran') }}">
                    @error('uang_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="uang_kembalian" class="form-label">Uang Kembalian</label>
                    <input type="number" name="uang_kembalian" class="form-control" id="uang_kembalian" readonly>
                </div>
            </div>
            <div class="col-md-8">
                <h4>Detail Pembelian</h4>
                <div id="detail-pembelian">
                    <!-- Baris pertama tabel -->
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control barangtoko_id" name="barangtoko_id[]" required>
                                <option selected disabled>Pilih barang</option>
                                @foreach ($totalstoktoko as $data)
                                    <option value="{{ $data->id }}"
                                        data-harga="{{ $data->totalStokGudang->barang->harga_jual }}">
                                        {{ $data->totalStokGudang->barang->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control harga_jual" name="harga_jual[]" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control jumlah" name="jumlah[]" value="0">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control total" name="total[]" readonly>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-row">Hapus</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success mt-3" id="add-row">Tambah List</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Transaksi</button>
    </form>

    <script>
        // Menangani perubahan pada dropdown barang
        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('barangtoko_id')) {
                var selectedOption = event.target.options[event.target.selectedIndex];
                var harga = selectedOption.getAttribute('data-harga');
                var row = event.target.closest('.row');
                var hargaInput = row.querySelector('.harga_jual');

                if (selectedOption.value !== "") {
                    hargaInput.value = harga;
                } else {
                    hargaInput.value = "";
                }
            }
        });

        // Menangani perubahan pada input jumlah pembelian
        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('jumlah')) {
                var row = event.target.closest('.row');
                var jumlah = parseFloat(event.target.value);
                var harga = parseFloat(row.querySelector('.harga_jual').value);
                var totalInput = row.querySelector('.total');
                var total = jumlah * harga || 0;
                totalInput.value = total.toFixed(2);

                hitungTotalHarga();
            }
        });

        // Tambah baris baru
        document.getElementById('add-row').addEventListener('click', function() {
            var newRowHtml = `
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control barangtoko_id" name="barangtoko_id[]" required>
                            <option selected disabled>Pilih barang</option>
                            @foreach ($totalstoktoko as $data)
                                <option value="{{ $data->id }}" data-harga="{{ $data->totalStokGudang->barang->harga_jual }}">
                                    {{ $data->totalStokGudang->barang->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control harga_jual" name="harga_jual[]" readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control jumlah" name="jumlah[]" value="0">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control total" name="total[]" readonly>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">Hapus</button>
                    </div>
                </div>`;

            var detailPembelian = document.getElementById('detail-pembelian');
            var newRow = document.createElement('div');
            newRow.innerHTML = newRowHtml.trim();
            detailPembelian.appendChild(newRow.firstChild);
        });

        // Hapus baris
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-row')) {
                var row = event.target.closest('.row');
                row.remove();
            }
        });

        // Fungsi untuk menghitung total harga dari semua input total
        function hitungTotalHarga() {
            var totalHarga = 0;
            var inputs = document.querySelectorAll('.total');

            inputs.forEach(function(input) {
                totalHarga += parseFloat(input.value) || 0;
            });

            document.getElementById('harga_total').value = totalHarga.toFixed(2);
        }

        // Menangani perubahan pada input uang pembayaran
        document.getElementById('uang_pembayaran').addEventListener('input', function() {
            var uangPembayaran = parseFloat(this.value);
            var hargaTotal = parseFloat(document.getElementById('harga_total').value);

            if (!isNaN(uangPembayaran) && !isNaN(hargaTotal)) {
                var uangKembalian = uangPembayaran - hargaTotal;
                document.getElementById('uang_kembalian').value = uangKembalian.toFixed(2);
            }
        });
    </script>
@endsection
