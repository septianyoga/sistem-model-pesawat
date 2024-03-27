@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('template/backend/dist/img/avatars/avatar-4.jpg') }}" alt="Christina Mason"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                        <div class="text-muted mb-2">{{ $user->role }}</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span>
                                Message</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Edit Profile</h5>
                    </div>
                    <form action="/profile" method="POST">
                        @csrf
                        @method('patch')
                        <div class="card-body h-100">
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-3">
                                    <label for="nama">Username</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="username"
                                        value="{{ $user->username }}">
                                    @error('username')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-3">
                                    <label for="nama">Email</label>
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-3">
                                    <label for="nama">Password</label>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" name="password">
                                    <small>*Kosongkan jika tidak diganti.</small>
                                </div>
                            </div>

                            <hr />
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
