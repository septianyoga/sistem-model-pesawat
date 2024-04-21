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

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var tombol = document.getElementById("modal-btn");
                tombol.click();
            });
        </script>
    @endif
@endsection
