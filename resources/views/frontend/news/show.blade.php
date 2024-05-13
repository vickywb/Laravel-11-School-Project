@extends('layouts.app-user', [
    'headerTitle' => 'Berita',
    'activePage' => 'Berita-index',
    'breadcrumbs' => [
        [
            'title' => 'Semua Berita',
            'url' => route('berita')
        ],
        [
            'title' => $article->title,
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')
    
<div class="container">
   
    <div class="row">

        <div class="col-md-8">
            <div class="article">
                <div class="article-single-content">

                    <div class="card-title" style="font-size: 36px"><b>{{ $article->title }}</b></div>
                    <div class="article-text-muted">
                        <span>Berita ini dibuat : {{ $article->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="mt-3">
                        <a href="#img{{ $article->file->id ?? asset('noimage/no-image.png') }}">
                            <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="news-image" style="object-fit: cover; width:100%; height:auto;">
                        </a>
                        
                        <!-- lightbox container hidden with CSS -->
                        <a href="#close-image" class="lightbox" id="img{{ $article->file->id ?? asset('noimage/no-image.png') }}">
                            <span style="background-image: url({{ $article->file->showFile ?? asset('noimage/no-image.png') }}"></span>
                        </a>
                        {{-- <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="news-image" style="object-fit: cover; width:100%; height:auto;"> --}}
                    </div>
                  
                </div>
            </div>
            
            <div class="article-single-description">
                <span>{!! $article->description !!}</span>
                <br>
            </div>
        </div>

        <div class="col-md-4 col-md-offset mt-4">
            <div class="col-9 d-flex mb-3">
                <form class="teacher-search d-flex" role="Cari Berita" action="{{ route('berita') }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Cari Berita" aria-label="Cari Berita" name="search_title" value="{{ request('title') }}">
                  <button class="teacher-btn search rounded" type="submit">Cari</button>
                </form>
            </div>

            <div class="row">
                <div class="card-title mt-5">
                    <h5>Kategori</h5>
                    <hr>
                    @foreach ($categories as $category)
                        <div class="row">
                           <div class="col-6">
                            <ul>
                                <li><a href="{{ route('kategori.berita', $category->slug) }}">{{ $category->title }}</a></li>
                            </ul>
                           </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection