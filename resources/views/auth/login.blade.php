@extends('layouts_auth.main')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back,</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('image/user.png') }}" alt="Charles Hall"
                                        class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input class="form-control form-control-lg" type="text" name="username"
                                            placeholder="Enter your username" />
                                        @error('username')
                                            <p class="text-danger">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter your password" />
                                        <small>
                                            <a href="index.html">Forgot password?</a>
                                        </small>
                                        @error('password')
                                            <p class="text-danger">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-3">
                                        {{-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> --}}
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
