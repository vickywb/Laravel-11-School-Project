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
                <form class="gallery-search d-flex" role="Cari Judul Galeri" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Cari Kategori" aria-label="Cari Judul Galeri" name="search_category" value="">
                  <button class="gallery-btn search rounded" type="submit">Cari</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($galleryFiles as $image)
                
            <div class="col-md-3">
                <div class="gallery-area">
                    <img src="{{ $image->file->showFile ?? asset('noimage/no-image.png') }}" alt="gallery-img" class="gallery-img">
                    <div class="gallery-title text-center">
                        <p class="mt-3 mb-2">{{ $image->gallery->title }}</p>
                        <span style="font-size: 14px">{{ $image->gallery->categoryImage->title }}</span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="d-flex">
                {{ $galleryFiles->links() }}
            </div>
        </div>
</div>
@endsection