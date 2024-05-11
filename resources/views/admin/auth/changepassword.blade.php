@extends('layouts.app-admin')

@section('title', 'Admin Dashboard - Change Password')
    
@section('content')
<div class="col-12 col-xl-9">

    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Change Password Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Change Password</h2>
            </div>

            @include('components._messages')
    
            <div class="col-12 statistics-card">
                <form action="{{ route('admin.doChangePassword') }}" method="post">
                        @csrf
                        @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">
                                        Current Password
                                        <span class="required">*</span>
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="current_password"
                                        name="current_password"
                                        value=""
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">
                                        New Password
                                        <span class="required">*</span>
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="new_password"
                                        name="new_password"
                                        value=""
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2">
                                        Confirm Password
                                        <span class="required">*</span>
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="new_password_confirmation"
                                        name="new_password_confirmation"
                                        value=""
                                    />
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