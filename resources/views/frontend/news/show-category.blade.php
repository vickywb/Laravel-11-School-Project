@extends('layouts.app-user', [
    'headerTitle' => 'Student',
    'activePage' => 'Student-create',
    'breadcrumbs' => [
        [
            'title' => 'Berita',
            'url' => route('berita')
        ],
        [
            'title' => 'Semua Berita',
        ]
    ]
])

@section('title', 'Semua Berita')
@section('content')

<div class="container">
   
    <div class="row">
       

        <div class="col-md-7">
            @foreach ($articles as $article)
            <div class="card mb-3" style="z-index: -99; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-title text-center mt-2">{{ $article->title }}</div>
                <div class="card-body">
                    <div class="row">
                        <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="news-image">
                        <span class="mt-2">Description: {!! $article->shortDescription !!} <a href="">Selengkapnya..</a></span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <span>Category: {{ $article->category->title }}</span>
                        <span>Updated: {{ $article->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-md-4 col-md-offset">
            <form action="#" method="post">
                <input type="text" id="search" placeholder="Cari Berita.." class="form-control ds-input">
            </form>
            <div class="row">
                <div class="card-title mt-3">
                    <h5>Kategori</h5>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                        <ul>
                            <li><a href="{{ route('kategori.berita', $category->slug) }}">{{ $category->title }}</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection