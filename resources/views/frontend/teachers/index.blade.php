@extends('layouts.app-user', [
    'headerTitle' => 'Guru',
    'activePage' => 'Guru-index',
    'breadcrumbs' => [
        [
            'title' => 'Semua Guru',
            'url' => route('guru')
        ],
        [
            'title' => 'Profile Guru',
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-row-reverse mb-3">
                <form class="teacher-search d-flex" role="Cari Nama Guru">
                  <input class="form-control me-2" type="search" placeholder="Cari Nama Guru" aria-label="Cari Nama Guru" name="search_name" value="{{ request('name') }}">
                  <button class="teacher-btn search rounded" type="submit">Cari</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-md-3">
                    <div class="teacher-team">
                        <div class="teachcer-area" id="img">
                            <a href="#img{{ $teacher->file->id ?? null }}">
                                <img src="{{ $teacher->file->showFile ?? asset('noimage/no-image.png') }}" alt="teacher-img" class="teacher-img">
                            </a>
                            
                            <!-- lightbox container hidden with CSS -->
                            <a href="#close-image" class="lightbox" id="img{{ $teacher->file->id ?? null }}">
                                <span style="background-image: url({{ $teacher->file->showFile ?? asset('noimage/no-image.png') }}"></span>
                            </a>
                            <div class="teacher-title text-center">
                                <p class="mt-2">{{ $teacher->name }}</p>
                                <span>{{ $teacher->field_of_study }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="d-flex mt-5">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
@endsection