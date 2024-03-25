@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Customer</h1>
    </div>
    <form action="/customer" method="POST" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="kode_customer" class="form-label">Kode Customer</label>
            <input type="text" name="kode_customer" class="form-control" id="kode_customer"
                value="{{ $kode_customer }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Customer</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="number" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror"
                id="no_telepon" value="{{ old('no_telepon') }}">
            @error('no_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                @foreach ($role as $data)
                    @if ($data->id == 4)
                        <option value="{{ $data->id }}">{{ $data->role_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Customer</button>
    </form>

@endsection
