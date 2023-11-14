@extends('layouts.app')

@section('title')
    Country Section
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Country List</span>
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
                                {{-- @foreach ($allData as $item)
                                @endforeach --}}
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->

    <!-- Modal -->
    <form action="{{route('compare-header.store')}}" method="POST">
        @csrf
        <x-modal title='Add Compare-Header Title' id="bootModal" modalSize='' button='save'>
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


@endsection
