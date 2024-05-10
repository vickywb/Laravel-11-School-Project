@extends('layouts.app-admin')

@section('title', 'Admin Student Dashboard - Student Create')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Student Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Student</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.student.store') }}" method="post">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Nisn
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Date of Birth
                                        <span class="required">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="datetimepicker1" name="date_of_birth" value="{{ old('date_of_birth') }}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Gender
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') }}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Religion
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion') }}" />
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Place of birth
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Phone Number
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">
                                    Adress
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" />
                            </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Origin of School
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="origin_of_school" name="origin_of_school" value="{{ old('origin_of_school') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Address of Shcool
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="address_of_school" name="address_of_school" value="{{ old('address_of_school') }}" />
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Father Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Mother Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Father Job
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="father_job" name="father_job" value="{{ old('father_job') }}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Mother Job
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="mother_job" name="mother_job" value="{{ old('mother_job') }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">
                                        Phone Number Parents
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="phone_number_parent" name="phone_number_parent" value="{{ old('phone_number_parent') }}" />
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