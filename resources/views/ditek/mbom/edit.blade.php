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
                    <form action="/mbom/{{ $mbom->id }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">NHA</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nha" placeholder="Masukan NHA"
                                        value="{{ $mbom->nha }}">
                                    @error('nha')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">No Item</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" value="{{ $mbom->no_item }}" class="form-control" name="no_item"
                                        placeholder="Masukan No Item">
                                    @error('no_item')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Component</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" value="{{ $mbom->component }}" class="form-control"
                                        name="component" placeholder="Masukan Component">
                                    @error('component')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Item Description</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" value="{{ $mbom->item_description }}" class="form-control"
                                        name="item_description" placeholder="Masukan Item Description">
                                    @error('item_description')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">Quantity</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" value="{{ $mbom->quantity }}" class="form-control"
                                        name="quantity" placeholder="Masukan Quantity">
                                    @error('quantity')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label">TRPGM MODEL</label>
                                </div>
                                <div class="col-9">
                                    <select name="trpgmmodel" id="select2" class="form-select">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($trpgmmodel as $model)
                                            <option value="{{ $model->id }}"
                                                {{ $mbom->trpgmmodel_id == $model->id ? 'selected' : '3' }}>
                                                {{ $model->c_pgm_model }}</option>
                                        @endforeach
                                    </select>
                                    @error('trpgmmodel')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between ">
                            <a href="/mbom" class="btn btn-link text-decoration-none "><i
                                    class="fa-solid fa-arrow-left"></i> Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
@endsection
