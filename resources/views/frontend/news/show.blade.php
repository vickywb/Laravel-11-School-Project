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
                        <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="news-image" style="object-fit: cover; width:100%; height:auto;">
                    </div>
                  
                </div>
            </div>
            
            <div class="article-single-description">
                <span>{!! $article->description !!}</span>
                <br>
            </div>
        </div>

        <div class="col-md-4 col-md-offset mt-4">
            <form action="" method="GET">
                <input type="text" id="search" placeholder="Cari Berita.." class="form-control ds-input" name="search_title" value="{{ request('title') }}">
            </form>
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