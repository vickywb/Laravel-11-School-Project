@extends('layouts.app-admin')

@section('title', 'Admin Gallery Dashboard - Gallery Edit')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Gallery Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Gallery</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                     
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Title
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery) }}" />
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category" class="mb-2"> Category </label>
                                    <select name="category_image_id" id="category_image_id" class="form-select">
                                       <option selected>Open this select menu</option>
                                       @foreach ($categoryImages as $categoryImage)
                                        <option value="{{ $categoryImage->id }}"
                                        @if (old('category_image_id') == $categoryImage->id || $categoryImage->id == $gallery->category_image_id)
                                            selected
                                        @endif>{{ $categoryImage->title }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection