@extends('dashboard.layouts.main')

@section('thisContent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Role</h1>
    </div>
    <form action="/role/{{ $role->id }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $role->id }}">
        <div class="mb-3">
            <label for="role_name" class="form-label">role_name Peran</label>
            <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror" id="role_name" value="{{ old('role_name', $role->role_name) }}">
            @error('role_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>

@endsection

