@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{ $title }}</h1>


        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="card-title mb-0">{{ $title }}</h5>
                        <a href="/model_referensi/add" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Tambah
                            Model Referensi</a>
                        {{-- <button class="btn btn-primary btn-sm" id="modal-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Model</button> --}}
                    </div>
                    <div class="adjust-table">
                        <table class="table table-hover my-0 w-100" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program</th>
                                    <th>Sub Program</th>
                                    <th>Versi</th>
                                    <th>Model</th>
                                    <th>Partnumber</th>
                                    <th>Nama Model</th>
                                    <th>Nama User Entry</th>
                                    <th>Date Entry</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $model->trpgm->c_pgm }}</td>
                                        <td>{{ $model->trpgmsub->c_pgm_sub }}</td>
                                        <td>{{ $model->trpon->c_pgm_ver }}</td>
                                        <td>{{ $model->c_pgm_model }}</td>
                                        <td>{{ $model->i_part_nha }}</td>
                                        <td>{{ $model->n_pgm_model }}</td>
                                        <td>{{ $model->user->name }}</td>
                                        <td>{{ $model->created_at }}</td>
                                        <td class="text-center">
                                            <a onclick="handleDelete({{ $model->id }},'model_referensi')"
                                                class="btn btn-danger btn-sm"><i data-confirm-delete="true"
                                                    class="fa-solid fa-trash"></i></a>
                                            <a href="/model_referensi/{{ $model->id }}/edit"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Model Referensi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/model_referensi" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Program</label>
                            <select name="trpgm_id" id="select2" class="form-control">
                                <option value="" hidden>-- Pilih --</option>
                                @foreach ($trpgms as $trpgm)
                                    <option value="{{ $trpgm->id }}">{{ $trpgm->c_pgm }}</option>
                                @endforeach
                            </select>
                            @error('trpgm_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subprogram</label>
                            <select name="trpgmsub_id" id="role" class="form-select">
                                <option value="" hidden>-- Pilih --</option>
                                @foreach ($trpgmsubs as $trpgmsub)
                                    <option value="{{ $trpgmsub->id }}">{{ $trpgmsub->c_pgm_sub }}</option>
                                @endforeach
                            </select>
                            @error('trpgmsub_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Versi</label>
                            <select name="trpon_id" id="role" class="form-select">
                                <option value="" hidden>-- Pilih --</option>
                                @foreach ($trpons as $trpon)
                                    <option value="{{ $trpon->id }}">{{ $trpon->c_pgm_ver }}</option>
                                @endforeach
                            </select>
                            @error('trpon_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control" name="c_pgm_model" placeholder="Masukan Model">
                            @error('c_pgm_model')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Partnumber</label>
                            <input type="text" class="form-control" name="i_part_nha" placeholder="Masukan Partnumber">
                            @error('i_part_nha')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Model</label>
                            <input type="text" class="form-control" name="n_pgm_model" placeholder="Masukan Nama Model">
                            @error('n_pgm_model')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($models as $u)
        <div class="modal fade" id="edit-{{ $u->id_c_pgm_pon }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/user/{{ $u->id_c_pgm_pon }}" method="post">
                        @csrf
                        @method('patch')
                        {{-- <div class="modal-body">
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
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
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
