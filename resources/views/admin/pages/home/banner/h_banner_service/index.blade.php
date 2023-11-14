@extends('layouts.app')

@section('title')
    Text To Speech | Header Banner Service Page
@endsection

@push('css')
<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .header-style {
    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
    color: #896cfe;
    font-weight: 900;
    text-decoration: underline;
    font-size: 24px;
}
    </style>
@endpush

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-between">
                <div class="page-title-box">
                    <h4 class="mb-0 header-style">Header Banner Service Page</h4>
                </div>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#CreateHeader"><i class="bx bx-plus"></i>Add Header Service</button>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle">
                                @foreach ($hbannerservice as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                        @if ($item->is_active)
                                            <form action="{{ route('hbannerservice.deactive', $item) }}"
                                                method="get" style='float: left; padding: 5px;'>
                                                <button type="submit" class="btn btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Deactivate Header">
                                                    <i class="mdi mdi-close-octagon-outline"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('hbannerservice.active', $item) }}"
                                                method="get" style='float: left; padding: 5px;'>
                                                <!-- @csrf -->
                                                <button type="submit" class="btn btn-success"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Active Header"><i class="mdi mdi-cloud-check"></i></button>
                                            </form>
                                        @endif
                                        <div style='float: left; padding: 5px;'>
                                            <button type="submit" class="btn btn-info edit-banner-header-service"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                            data-item="{{ $item->id }}"><i class="fa fa-pencil-alt"></i></button>
                                        </div>

                                        <form action="{{ route('header_banner_service.destroy', $item) }}" method="post"
                                            style='float: left; padding: 5px;'>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger delete-confirm"
                                                data-name="{{ $item->title }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="fa fa-trash-alt"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

    <!--  For Create Header Banner Button-->
    <form action="{{ route('header_banner_service.store') }}" method="post">
        @csrf
        <x-modal title='Create Banner Header Service' id="CreateHeader" modalSize='' button='Create Header Service'>
            <div class="container">
                <div class="row">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Type Your Header Service Title"
                            name="title">
                        <label for="">Title</label>
                    </div>
                    <div id="headerHelp" class="form-text">Enter the title on your header button service section</div>
                </div>
            </div>
        </x-modal>
    </form>

    <!--  For Edit Header Banner Button-->
    <form method="POST" id="editForm">
        @csrf
        @method('PUT')
        <x-modal title='Edit Banner Header Service' id="editModal" modalSize='' button='Update Banner Header Service'>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Type Your Header Button Title"
                                id="HBannerServiceTitleID" name="title">
                            <label for="HBannerServiceTitleID">Title</label>
                        </div>
                        <div id="headerHelp" class="form-text">Enter the title on your header button service section</div>
                    </div>
                </div>
        </x-modal>
    </form>

@endsection

@push('script')
<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush
