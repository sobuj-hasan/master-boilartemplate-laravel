@extends('layouts.app')

@section('title')
    Trusted Client
@endsection

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6 d-flex align-items-center justify-content-between">
                    <div class="page-title-box">
                        <span class="mb-0 header-style">Trusted Client Header List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-otr-primary" data-bs-toggle="modal" data-bs-target="#AddHeaderModal">
                        <i class="bx bx-plus"></i>
                        Add New
                    </button>
                    {{-- @if ($admin->can('Explore Categories Create'))
                    @endif --}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['SI', 'Title', 'status', 'Action']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($trusted_clients as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ Str::limit($item->title, 70, '...') }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- @if ($admin->can('Deactivate Header')) --}}
                                            @if ($item->is_active)
                                                <form action="{{ route('trusted-client-header.deactive', $item->id) }}"
                                                    method="get" style='float: left; padding: 5px;'>
                                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Deactivate Header">
                                                        <i class="mdi mdi-close-octagon-outline"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('trusted-client-header.active', $item->id) }}"
                                                    method="get" style='float: left; padding: 5px;'>
                                                    <!-- @csrf -->
                                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Active Header"><i
                                                            class="mdi mdi-cloud-check"></i></button>
                                                </form>
                                            @endif
                                            {{-- @endif --}}
                                            <div style='float: left; padding: 5px;'>
                                                {{-- @if ($admin->can('Explore Header Edit')) --}}
                                                <button type="submit" class="btn btn-info edit-trusted-client-header"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    data-item="{{ $item->id }}"><i
                                                        class="fa fa-pencil-alt"></i></button>
                                                {{-- @endif --}}
                                            </div>
                                            {{-- @if ($admin->can('Explore Header Delete')) --}}
                                            <form action="{{ route('trusted-client-header.destroy', $item) }}" method="post"
                                                    style='float: left; padding: 5px;'>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="{{ $item->title }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"><i
                                                            class="fa fa-trash-alt"></i></button>
                                                </form>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('trusted-client-header.store') }}" method="POST">
                @csrf
                <x-modal title='Trusted Client Header' id="AddHeaderModal" modalSize='' button="Save">
                    <div class="container">
                        <div class="row">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Type Your Header Title"
                                    id="TrustedClientHeader" name="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label>Title</label>
                            </div>
                        </div>
                    </div>
                </x-modal>
            </form>

            <!--  For Edit Header Title-->
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <x-modal title='Edit Trusted Client Header' id="editModal1" modalSize='' button='Edit'>
                    <div class="container">
                        <div class="row">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Type Your Header Title"
                                    id="trustClintTitleEdit" name="title">
                                <label for="trustClintTitleEdit">Title</label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </x-modal>
            </form>

        </div> <!-- container-fluid -->
    </div>
@endsection
