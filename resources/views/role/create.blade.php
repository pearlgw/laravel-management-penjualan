@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 text-gray-800">Form Role</h1>
                </div>
                <div class="card-body">
                    <form action="/role" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Nama Peran</label>
                            <input type="text" name="role_name"
                                class="form-control @error('role_name') is-invalid @enderror" id="role_name"
                                value="{{ old('role_name') }}" required>
                            @error('role_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <a href="/role" class="btn btn-warning text-dark"><i class="bi bi-arrow-left-circle"></i>
                            Kembali</a>

                        <button type="submit" class="btn btn-success">Tambah Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
