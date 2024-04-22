@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{ $title }}</h1>


        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="card-title mb-0">{{ $title }}</h5>
                        <div>
                            <a href="/model_referensi/add" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Add
                                Data
                                Model</a>
                            <button class="btn btn-success btn-sm" id="modal-btn" data-bs-toggle="modal"
                                data-bs-target="#import">Import Excel</button>
                        </div>
                    </div>
                    <div class="adjust-table overflow-auto ">
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
                                        <td>{{ $model->trpgm?->c_pgm }}</td>
                                        <td>{{ $model->trpgmsub?->c_pgm_sub }}</td>
                                        <td>{{ $model->trpon?->c_pgm_ver }}</td>
                                        <td>{{ $model->c_pgm_model }}</td>
                                        <td>{{ $model->i_part_nha }}</td>
                                        <td>{{ $model->n_pgm_model }}</td>
                                        <td>{{ $model->user?->name }}</td>
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

    {{-- modal import --}}
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Model Referensi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/model_referensi/import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <p>Keterangan: <br> Format kolom Excel harus sama.
                                <a class="text-decoration-none" href="/download_template_excel">Klik Disini</a>
                                untuk download template excel.
                            </p>
                            <label class="form-label">Masukan file excel</label>
                            <input type="file" class="form-control" name="file" placeholder="Masukan file"
                                accept=".xlsx,.xlx,.csv " value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var tombol = document.getElementById("modal-btn");
                tombol.click();
            });
        </script>
    @endif
@endsection
