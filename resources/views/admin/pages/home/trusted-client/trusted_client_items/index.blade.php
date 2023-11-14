@extends('layouts.app')

@section('title')
    Trusted Client Ttems
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
                        <span class="mb-0 header-style">Trusted Client Items List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-otr-primary" data-bs-toggle="modal" data-bs-target="#AddItems">
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
                            <x-table :headers="['SI', 'Title', 'Photo', 'trusted client', 'Action']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($trusted_client_items as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ Str::limit($item->title, 70, '...') }}</td>
                                        <td>
                                            <img src="{{ asset('storage/images/'. $item->photo) }}" width="60" alt="">
                                        </td>
                                        <td>{{ $item->trustedClient->title }}</td>
                                        <td>
                                            <div style='float: left; padding: 5px;'>
                                                {{-- @if ($admin->can('Explore Header Edit')) --}}
                                                <button type="submit" class="btn btn-info edit-trusted-client-items"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                     title="Edit"
                                                    data-item="{{ $item->id }}"><i
                                                        class="fa fa-pencil-alt"></i></button>
                                                {{-- @endif --}}
                                            </div>
                                            {{-- @if ($admin->can('Explore Header Delete')) --}}
                                            <form action="{{ route('trusted-client-items.destroy', $item) }}" method="post" style='float: left; padding: 5px;'>
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger delete-confirm" data-name="{{ $item->title }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
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

            <form action="{{ route('trusted-client-items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-modal title='Trusted Client Items' id="AddItems" modalSize='' button="SAVE">
                    <div class="container">
                        <div class="row">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Type Your Item Title"
                                    id="TrustedClientHeader" name="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label>Title</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo</label>

                                <input type="file" class="form-control" name="photo" alt="logo">

                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Trusted Client Header</label>

                                <select class="form-control" name="trusted_client_id" id="Trusted Client Id">
                                    <option value="">Select</option>
                                    @foreach ($trusted_client_headers as $item)
                                        <option value="{{ $item->id}}">{{ $item->title }}</option>
                                    @endforeach
                                </select>

                                @error('trusted_client_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </x-modal>
            </form>

            <!--  For Edit Items-->
            <form method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-modal title='Edit Trusted Client Items' id="editModal" modalSize='' button='Edit'>
                    <div class="container">
                        <div class="row">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Type Your Header Title"
                                    id="trustClintItemTitleEdit" name="title">
                                <label for="trustClintItemTitleEdit">Title</label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" class="form-control" name="photo" alt="logo">
                            </div>

                            <div>
                                <label class="form-label">Trusted Client Header</label>

                                <select class="form-control" name="trusted_client_id" id="trustClintHeaderEdit">
                                    <option value="">Select</option>
                                    @foreach ($trusted_client_headers as $item)
                                        <option value="{{ $item->id}}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('trusted_client_id')
                                    <span class="text-danger">Trusted Client Header field is required.</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </x-modal>
            </form>

        </div> <!-- container-fluid -->
    </div>
@endsection
