@extends('layouts.main')

@section('contents')
    <div class="row login mx-0 my-0 justify-content-center">
        <div class="col-md-5">
            <div class="d-flex  align-items-center vh-100">
                <div class="card form-login" style="width: 40rem;">
                    <div class="card-header text-center fw-bold fs-5">
                        Login
                    </div>

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-2" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="post" action="/">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary fw-bold">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
