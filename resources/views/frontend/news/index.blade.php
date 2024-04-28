@extends('layouts.app-user', [
    'headerTitle' => 'Berita',
    'activePage' => 'Berita-index',
    'breadcrumbs' => [
        [
            'title' => 'Semua Berita',
            'url' => route('berita')
        ],
        [
            'title' => 'Berita Terbaru',
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
            <form action="" method="GET">
                <input type="text" id="search" placeholder="Cari Berita.." class="form-control ds-input" name="search_title" value="{{ request('title') }}">
            </form>
            <div class="row">
                <div class="card-title mt-3">
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

        <div class="d-flex">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection