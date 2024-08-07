@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">Data Role</h3>
            <a href="/role/create" class="btn btn-success d-block">Tambah Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peran</th>
                            <th>Waktu Buat</th>
                            <th>Waktu Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->role_name }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }}
                                </td>
                                <td style="vertical-align: middle;">
                                    <a href="/role/{{ $data->id }}/edit" class="btn btn-warning text-dark">Edit <i
                                            class="fas fa-edit"></i></a>
                                    <form action="/role/{{ $data->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border-0"
                                            onclick="return confirm('Yakin hapus data role ini?')">Delete
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
