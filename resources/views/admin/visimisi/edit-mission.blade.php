@extends('layouts.app-admin')

@section('title', 'Admin Mission Dashboard - Mission Edit')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Mission Form</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title mb-4">Form Mission</h2>
            </div>

            @include('components._messages')

            <div class="col-12 statistics-card">
                <form action="{{ route('admin.mission.update', $mission) }}" method="post" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-3">
                            <label for="mission" class="mb-2">
                                Mission
                                <span class="required">*</span>
                            </label>
                            <textarea
                                class="form-control"
                                name="mission"
                                id="mission"
                                cols="30"
                                rows="10"
                            >{{ $mission->mission }}</textarea>
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