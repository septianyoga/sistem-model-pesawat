@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{ $title }}</h1>


        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="card-title mb-0">{{ $title }}</h5>
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
                                    <th>Action</th>
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
                                            <a href="/view_model/{{ $model->id }}" title="Detail"
                                                class="btn btn-success btn-sm"><i data-confirm-delete="true"
                                                    class="fa-solid fa-eye"></i></a>
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



    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var tombol = document.getElementById("modal-btn");
                tombol.click();
            });
        </script>
    @endif
@endsection
