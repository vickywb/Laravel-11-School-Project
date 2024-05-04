@extends('layouts.app-admin')

@section('title', 'Admin Dashboard - Category Image Create')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Category Image Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Category Image</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.categoryImage.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">
                                    Title
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required/>
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