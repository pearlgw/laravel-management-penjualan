@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Pemasok</h3>
            <a href="/pemasok/create" class="btn btn-success d-block">Tambah Pemasok</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemasok</th>
                            <th>Nama Pemasok</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasok as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_pemasok }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_telp }}</td>
                                <td style="vertical-align: middle;">
                                    <div style="display: flex; align-items: center;">
                                        <a href="/pemasok/{{ $data->id }}/edit" class="btn btn-warning text-dark mb-1"
                                            style="flex: 1;">
                                            <div style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit ml-1"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <form action="/pemasok/{{ $data->id }}" method="POST" class="d-inline"
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
