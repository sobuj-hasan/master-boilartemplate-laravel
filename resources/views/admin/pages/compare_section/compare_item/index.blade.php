@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Compare Item
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Compare Item List</span>
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
                            <x-table :headers="['Title','Description','Image', 'Status', 'Action']">
                                @foreach ($allItems as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! $item->description !!}</td>
                                        <td>
                                            <img src="{{ asset('storage/images/'.$item->image) }}" width="50" alt="">
                                        </td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_active)
                                                <form action="{{ route('compare-item.deactive', $item) }}" method="get"
                                                    style='float: left; padding: 5px;'>
                                                    <!-- @csrf -->
                                                    <button type="submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Deactivate Package"><i
                                                            class="mdi mdi-close-octagon-outline"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('compare-item.active', $item) }}" method="get"
                                                    style='float: left; padding: 5px;'>
                                                    <!-- @csrf -->
                                                    <button type="submit" class="btn btn-success"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Active Package"><i
                                                            class="mdi mdi-cloud-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="border-0 p-0 edit-compare-item"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    data-item="{{ $item->id }}">
                                                    <a class="btn btn-info text-white"
                                                        href="#"><i
                                                            class="fa fa-pencil-alt"></i></a>
                                                </button>
                                            </div>

                                            
                                            <form action="{{route('compare-item.destroy', $item)}}" method="post"
                                                style='float: left; padding: 5px;'>
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger delete-confirm"
                                                    data-name="{{ $item->title }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash-alt"></i>
                                                </button>
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

    <!-- Modal -->
    <form action="{{route('compare-item.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-modal title='Add Compare Item Insertion' button="save" id="bootModal" modalSize='modal-lg'>
            <div class="container">
                <div class="row">
                    <div class="form-floating mb-3">
                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control"/>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input type="file" name="image" class="form-control"/>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="menubar">A simple menubar change.</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </x-modal>
    </form>

      <!-- Modal For Compare Item Edit -->
    <form  method="POST" id="editForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-modal title='Edit Compare Item' button="Update" id="editModal" modalSize='modal-lg'>
            <div class="container">
                <div class="row">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder=""
                            id="compareItemTitleEdit" name="title">
                        <label for="compareItemTitleEdit">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="" id="" name="image">
                    </div>
                    <div class="form-floating mb-3" id="compareItemTImageEdit">
                        
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="" id="compareItemDesEditOne"
                            name="description" style="height: 90px"></textarea>
                        <label for="compareItemDesEdit">Description</label>
                    </div>
                </div>
            </div>
        </x-modal>
    </form>


  

    <script src="https://cdn.tiny.cloud/1/qwum3mb9nppyeg5mro6cgne8z1kcoqwb1d8futzd22jwixoy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
    <script>
        tinymce.init({ selector: 'textarea',
         plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
         toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
         
       });
      </script>

@endsection