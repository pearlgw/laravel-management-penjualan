@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Toko</h3>
            <a href="/toko/create" class="btn btn-success d-block">Tambah Toko</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Toko</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Waktu Buat</th>
                            <th>Waktu Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toko as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_toko }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td>
                                <td style="vertical-align: middle;">
                                    <a href="/toko/{{ $data->id }}/edit" class="btn btn-warning text-dark">Edit <i
                                            class="fas fa-edit"></i></a>
                                    <form action="/toko/{{ $data->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border-0"
                                            onclick="return confirm('Yakin hapus data toko ini?')">Delete
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
