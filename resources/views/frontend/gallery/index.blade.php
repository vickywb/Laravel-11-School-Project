@extends('layouts.app-user', [
    'headerTitle' => 'Guru',
    'activePage' => 'Guru-index',
    'breadcrumbs' => [
        [
            'title' => 'Semua Galeri',
            'url' => route('gallery')
        ],
        [
            'title' => 'Galeri Sekolah',
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')
<div class="container">
    
        <div class="row">
            <div class="col-12 d-flex flex-row-reverse mb-3">
                <form class="gallery-search d-flex" role="Cari Judul Galeri">
                  <input class="form-control me-2" type="search" placeholder="Cari Judul Galeri" aria-label="Cari Judul Galeri">
                  <button class="gallery-btn search rounded" type="submit">Cari</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 1</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 2</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 3</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 4</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 5</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 6</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 7</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3">Foto 8</p>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection