@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{ $title }}</h1>


        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>
                    <form action="/model_referensi" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Program</label>
                                </div>
                                <div class="col-9">
                                    <select name="trpgm_id" id="select2" class="form-select">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($trpgms as $trpgm)
                                            <option value="{{ $trpgm->id }}">{{ $trpgm->c_pgm }}</option>
                                        @endforeach
                                    </select>
                                    @error('trpgm_id')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Subprogram</label>
                                </div>
                                <div class="col-9">
                                    <select name="trpgmsub_id" id="select3" class="form-select">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($trpgmsubs as $trpgmsub)
                                            <option value="{{ $trpgmsub->id }}">{{ $trpgmsub->c_pgm_sub }}</option>
                                        @endforeach
                                    </select>
                                    @error('trpgmsub_id')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Versi</label>
                                </div>
                                <div class="col-9">
                                    <select name="trpon_id" id="select4" class="form-select">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($trpons as $trpon)
                                            <option value="{{ $trpon->id }}">{{ $trpon->c_pgm_ver }} |
                                                {{ $trpon->c_pgm }}</option>
                                        @endforeach
                                    </select>
                                    @error('trpon_id')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Model</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="c_pgm_model"
                                        placeholder="Masukan Model">
                                    @error('c_pgm_model')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Partnumber</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="i_part_nha"
                                        placeholder="Masukan Partnumber">
                                    @error('i_part_nha')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Nama Model</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="n_pgm_model"
                                        placeholder="Masukan Nama Model">
                                    @error('n_pgm_model')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between ">
                            <a href="/model_referensi" class="btn btn-link text-decoration-none "><i
                                    class="fa-solid fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}

    {{-- modal edit --}}
@endsection
