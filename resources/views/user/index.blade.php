@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data User</h3>
            <a href="/user/create" class="btn btn-primary d-block">Tambah User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode User</th>
                            <th>Nama user</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user1 as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_user }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_telepon }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role->role_name }}</td>
                                <td style="vertical-align: middle;">
                                    <a href="/user/{{ $data->id }}/edit" class="badge bg-warning text-dark"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="/user/{{ $data->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0"
                                            onclick="return confirm('Yakin hapus data User ini?')">
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
