@extends('layouts.app-admin')

@section('title', 'Admin Gallery Dashboard - Gallery Detail')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Gallery Detail</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="col-12 statistics-card">
                    <form action="{{ route('admin.gallery.storeImage', $gallery) }}" method="post" enctype="multipart/form-data">
                        @csrf
                
                        <div class="col-md-12">
                            <h3>Add New Gallery Image</h3>
                            <div class="form-group mb-3">
                                <label for="file" class="mb-2">
                                    Image
                                    <span class="required">*</span>
                                </label>
                                <input type="file" name="images[]" id="file" class="form-control" multiple accept=".png, .jpg, .jpeg"  />
                                <p style="color: red; font-size: 14px">File Image Max 2 MB</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-12">
                <div class="statistics-card mb-0">
                    <div class="row justify-content-start">
                    @foreach ($galleries as $image)
                        <div class="col-12 col-md-3 mb-3 mb-md-0">
                            <div class="card w-100">
                                <img
                                    src="{{ $image->file->showFile }}"
                                    class="thumbnail-image rounded-top"
                                    alt="gallery-image"
                                />
                                <div class="card-body p-0">
                                    <form action="{{ route('admin.gallery.deleteImage', [$gallery, $image]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger w-100 rounded-0 rounded-bottom"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
    
</div>
@endsection