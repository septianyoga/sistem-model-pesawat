@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more page examples
            </a>
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
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Skills</h5>
                        <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                        <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                        <a href="#" class="badge bg-primary me-1 my-1">React</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UX</a>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives
                                in <a href="#">San Francisco, SA</a></li>

                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span>
                                Works at <a href="#">GitHub</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span>
                                From <a href="#">Boston</a></li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Elsewhere</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="#">staciehall.co</a></li>
                            <li class="mb-1"><a href="#">Twitter</a></li>
                            <li class="mb-1"><a href="#">Facebook</a></li>
                            <li class="mb-1"><a href="#">Instagram</a></li>
                            <li class="mb-1"><a href="#">LinkedIn</a></li>
                        </ul>
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
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $user->email }}">
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
