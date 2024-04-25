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
                        <h5>Program</h5>
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <td>Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpgm->c_pgm }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50">Nama Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpgm->n_pgm }}</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <h5>Sub Program</h5>
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <td>Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpgmsub->c_pgm_sub }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50">Nama Sub Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpgmsub->n_pgm_sub }}</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <h5>Versi</h5>
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <td>Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpon->c_pgm }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Program</td>
                                    <td>:</td>
                                    <td>{{ $models->trpon->c_pgm_sub }}</td>
                                </tr>
                                <tr>
                                    <td>Versi / POPN</td>
                                    <td>:</td>
                                    <td>{{ $models->trpon->c_pgm_ver }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Versi</td>
                                    <td>:</td>
                                    <td>{{ $models->trpon->e_pgm }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50">Core Organisasi</td>
                                    <td>:</td>
                                    <td>{{ $models->trpon->c_org_core }}</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="/view_model" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
