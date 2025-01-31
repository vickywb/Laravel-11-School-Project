@extends('layouts.app-user', [
    'headerTitle' => 'Berita',
    'activePage' => 'Berita-show',
    'breadcrumbs' => [
        [
            'title' => 'Semua Berita',
            'url' => route('berita')
        ],
        [
            'title' => 'Kategori ' . $category->title,
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')

<div class="container">
   
    <div class="row">
       
        <div class="col-md-7">
            @foreach ($articles as $article)
            <div class="article">
                <div class="article-content">

                    <div class="article-media">
                        <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="news-image" class="media-image">
                    </div>

                    <div class="article-title"><b>{{ $article->title }}</b></div>

                    <div class="article-text-muted">
                        <span>Berita ini dibuat : {{ $article->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="article-body">
                        <span>{!! $article->shortDescription !!}</span>
                        <br>
                    </div>
                    <a href="{{ route('detail.berita', $article->slug) }}" class="article-link">Baca Berita</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-md-4 col-md-offset">
            <div class="col-9 d-flex mb-3">
                <form class="teacher-search d-flex" role="Cari Berita" action="{{ route('berita') }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Cari Berita" aria-label="Cari Berita" name="search_title" value="{{ request('title') }}">
                  <button class="teacher-btn search rounded" type="submit">Cari</button>
                </form>
            </div>
            <div class="row">
                <div class="card-title mt-3">
                    <h5>Kategori</h5>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        @foreach ($categories as $categoryItem)
                        <ul>
                            <li><a href="{{ route('kategori.berita', $categoryItem->slug) }}">{{ $categoryItem->title }}</a></li>
                        </ul>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection