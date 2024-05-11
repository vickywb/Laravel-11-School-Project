@extends('layouts.app-admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="col-12 col-xl-9">

    <div class="nav">

        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">

            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="" />
                </button>
                <h2 class="nav-title">Overview</h2>
            </div>

            <button class="btn-notif d-block d-md-none">
                <img src="{{ asset('backend/assets/img/global/bell.svg') }}" alt="" />
            </button>

        </div>
    
        <div class="nav-input-group">
          <span><img src="{{ asset('backend/assets/img/global/person-circle.svg') }}"> Welcome, {{ Auth::user()->name }} !</span>
        </div>

    </div>

    <div class="content">

        @include('components._messages')

        <div class="row">
            
            <div class="col-12">
                <h2 class="content-title">Statistics</h2>
                <h5 class="content-desc mb-4">Your team powers</h5>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
              <div class="statistics-card simple">
                <div class="d-flex justify-content-between align-items-center">
                    <div
                        class="d-flex flex-column justify-content-around align-items-start employee-stat"
                    >
                        <h5 class="content-desc">Guru saat ini</h5>

                        <h3 class="statistics-value">{{ $teachers->count() }}</h3>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card simple">
                    <div class="d-flex justify-content-between align-items-center">
                        <div
                            class="d-flex flex-column justify-content-around align-items-start employee-stat"
                        >
                            <h5 class="content-desc">Article Saat ini</h5>
                                <h3 class="statistics-value">{{ $articles->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card simple">
                    <div class="d-flex justify-content-between align-items-center">
                        <div
                            class="d-flex flex-column justify-content-around align-items-start employee-stat"
                        >
                            <h5 class="content-desc">Jurusan Saat ini</h5>

                            <h3 class="statistics-value">{{ $majors->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card simple">
                    <div class="d-flex justify-content-between align-items-center">
                        <div
                            class="d-flex flex-column justify-content-around align-items-start employee-stat"
                        >
                            <h5 class="content-desc">Murid Saat ini</h5>

                            <h3 class="statistics-value">{{ $students->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
