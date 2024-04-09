@extends('layouts.app-admin')

@section('title', 'Admin Student Detail')
@section('content')
<div class="col-12 col-xl-9">

    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Student Detail</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h2 class="content-title mb-4">Detail Student</h2>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.student.edit', $student) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                </div>
            </div>

            <div class="col-12">
                <div class="statistics-card mb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ Str::upper($student->name) }}</h5>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 px-1">
                            <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                <tbody>
                                    <tr>
                                        <td width="35%">
                                            <h6 class="card-subtitle text-muted">Nisn</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">
                                                : {{ $student->nisn }}
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Gender</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->gender) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Place of Birth</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->place_of_birth) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Date of Birth</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ $student->date_of_birth->format('d M Y') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Phone Number</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ $student->phone_number }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Address</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->address) }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-6 px-1">
                            <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                <tbody>
                                    <tr>
                                        <td width="35%">
                                            <h6 class="card-subtitle text-muted">Origin of School</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->origin_of_school) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Address of School</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->address_of_school) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Father Name</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->father_name ?? '-') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Mother Name</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->mother_name ?? '-') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Father Job</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->father_job ?? '-') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Mother Job</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ Str::upper($student->mother_job ?? '-') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="card-subtitle text-muted">Phone Number Parents</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-subtitle text-muted">: {{ $student->phone_number_parent }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection