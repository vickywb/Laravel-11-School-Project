@extends('layouts.app-admin')

@section('title', 'Admin User Dashboard - User Create')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">User Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form User</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.user.update', $user) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="email" class="mb-2">
                                        Email
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="role" class="mb-2"> Roles </label>
                                    <span class="required">*</span>
                                    <select name="role_id" id="role_id" class="form-select">
                                       <option selected>Open this select menu</option>
                                       @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @foreach ($user->roles as $r)
                                                @if (old('role_id') == $role->id || $role->id == $r->id)
                                                selected
                                                @endif>{{ $role->name }}</option>
                                            @endforeach
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                      
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="current_password" class="mb-2">
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
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="new_password" class="mb-2">
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
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="new_password_confirmation" class="mb-2">
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