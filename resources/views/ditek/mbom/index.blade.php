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
                            <a href="/mbom/add" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Add
                                Data
                                MBOM</a>
                            <button class="btn btn-success btn-sm" id="modal-btn" data-bs-toggle="modal"
                                data-bs-target="#import">Import Excel</button>
                        </div>
                    </div>
                    <div class="adjust-table">
                        <table class="table table-hover my-0 w-100" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NHA</th>
                                    <th>No Item</th>
                                    <th>Component</th>
                                    <th>Item Description</th>
                                    <th>Quantity</th>
                                    <th>TRPGM MODEL</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eboms as $ebom)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ebom->nha }}</td>
                                        <td>{{ $ebom->no_item }}</td>
                                        <td>{{ $ebom->component }}</td>
                                        <td>{{ $ebom->item_description }}</td>
                                        <td>{{ $ebom->quantity }}</td>
                                        <td>{{ $ebom->trpgmmodel->n_pgm_model }}</td>
                                        <td class="text-center">
                                            <a onclick="handleDelete({{ $ebom->id }},'mbom')"
                                                class="btn btn-danger btn-sm"><i data-confirm-delete="true"
                                                    class="fa-solid fa-trash"></i></a>
                                            <a href="/mbom/{{ $ebom->id }}/edit" class="btn btn-info btn-sm"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
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

    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data MBOM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/mbom/import" method="post" enctype="multipart/form-data">
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
