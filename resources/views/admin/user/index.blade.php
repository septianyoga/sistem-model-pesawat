@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{ $title }}</h1>


        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="card-title mb-0">{{ $title }}</h5>
                        <button class="btn btn-primary btn-sm" id="modal-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fa-solid fa-user-plus"></i> Add</button>
                    </div>
                    <div class="adjust-table">
                        <table class="table table-hover my-0" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="text-center">
                                            <a onclick="handleDelete({{ $user->id }},'users')"
                                                class="btn btn-danger btn-sm"><i data-confirm-delete="true"
                                                    class="fa-solid fa-trash"></i></a>
                                            <button id="btn-{{ $user->id }}" class="btn btn-info btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $user->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/user" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama"
                                value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username"
                                value="{{ old('username') }}">
                            @error('username')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukan Email"
                                value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                            @error('password')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Admin">Admin</option>
                                <option value="Direktorat Teknologi">Direktorat Teknologi</option>
                                <option value="Direktorat Produksi">Direktorat Produksi</option>
                            </select>
                            @error('role')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($users as $u)
        <div class="modal fade" id="edit-{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/user/{{ $u->id }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukan Nama"
                                    value="{{ $u->name }}">
                                @error('name')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukan Username" value="{{ $u->username }}">
                                @error('username')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukan Email"
                                    value="{{ $u->email }}">
                                @error('email')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan Password">
                                <small>*Kosongkan jika tidak diganti.</small>
                                @error('password')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="" hidden>-- Pilih --</option>
                                    <option value="Admin" {{ $u->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Direktorat Teknologi"
                                        {{ $u->role == 'Direktorat Teknologi' ? 'selected' : '' }}>Direktorat Teknologi
                                    </option>
                                    <option value="Direktorat Produksi"
                                        {{ $u->role == 'Direktorat Produksi' ? 'selected' : '' }}>Direktorat Produksi
                                    </option>
                                </select>
                                @error('role')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var tombol = document.getElementById("modal-btn");
                tombol.click();
            });
        </script>
    @endif
@endsection
