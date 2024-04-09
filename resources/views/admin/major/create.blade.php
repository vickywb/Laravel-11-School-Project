@extends('layouts.app-admin')

@section('title', 'Admin Dashboard - Article Create')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Major Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Major</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.major.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Title
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="file" class="mb-2">
                                        Image
                                        <span class="required">*</span>
                                    </label>
                                    <input type="file" name="file" id="file" class="form-control" />
                                    <p style="color: red; font-size: 14px">File Image Max 2 MB</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="description" class="mb-2">
                                Description
                                <span class="required">*</span>
                            </label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="description"
                                cols="30"
                                rows="10"
                            ></textarea>
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