@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Compare Header
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Compare Header List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="border-0 p-0" data-bs-toggle="modal" data-bs-target="#bootModal">
                        <a href="#" class="btn btn-otr-primary text-white">
                            <i class="bx bx-plus"></i>
                            Add New
                        </a>
                    </button>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Title', 'Status', 'Action']">
                                @foreach ($allData as $item)
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
                                                <form action="{{ route('compare-header.deactive', $item) }}" method="get"
                                                    style='float: left; padding: 5px;'>
                                                    <!-- @csrf -->
                                                    <button type="submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Deactivate Package"><i
                                                            class="mdi mdi-close-octagon-outline"></i></button>
                                                </form>
                                            @else
                                                <form action="{{ route('compare-header.active', $item) }}" method="get"
                                                    style='float: left; padding: 5px;'>
                                                    <!-- @csrf -->
                                                    <button type="submit" class="btn btn-success"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Active Package"><i
                                                            class="mdi mdi-cloud-check"></i></button>
                                                </form>
                                            @endif

                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="btn btn-info edit-compare-header"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    data-item="{{ $item->id }}"><i class="fa fa-pencil-alt"></i>
                                                </button>
                                            </div>

                                            
                                            <form action="{{route('compare-header.destroy', $item)}}" method="post"
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
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- container-fluid -->

    <!-- Modal For Compare Header Store -->
    <form action="{{route('compare-header.store')}}" method="POST">
        @csrf
        <x-modal title='Add Compare-Header Title' button="save" id="bootModal" modalSize=''>
            <div class="container">
                <div class="row">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Type Your Compare-Header Title"
                            id="compareHeaderTitle" name="title">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        <label for="exploreHeaderTitle">Title</label>
                    </div>
                </div>
            </div>
        </x-modal>
    </form>

  <!-- Modal For Compare Header Edit -->
  <form  method="POST" id="editForm">
    @csrf
    @method('PUT')
    <x-modal title='Edit Compare Header' button="Update" id="editModal" modalSize=''>
        <div class="container">
            <div class="row">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Type Your Compare Header Title"
                        id="compareHeaderTitleEdit" name="title">
                    <label for="compareHeaderTitleEdit">Title</label>
                </div>
            </div>
        </div>
    </x-modal>
</form>


@endsection