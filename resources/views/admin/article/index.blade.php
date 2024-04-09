@extends('layouts.app-admin')

@section('title', 'Admin Article Dashboard')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Article Table</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">

            {{-- include success and error message --}}
            @include('components._messages')

            <div class="col-12 d-flex justify-content-between">
                <h2 class="content-title mb-4">List Article</h2>
                <div class="btn mb-2 mb-md-0">
                    <a href="{{ route('admin.article.create') }}" class="btn btn-sm btn-primary"> Add new</a>
                </div>
            </div>

            <div class="col-12 search-menu mb-4">
                <form action="" method="GET">
                    <div class="row d-flex">
                        <div class="col-12 col-md-3 d-flex">
                            <input
                                type="text"
                                class="form-control border-0 shadow-sm"
                                name="search_title"
                                value="{{ request('name') }}"
                                placeholder="Search Name"
                            />
                        </div>
                        <div class="col-12 col-md-2 d-grid d-md-flex mt-3 mt-md-0">
                            <button class="btn btn-sm btn-warning">
                                <img src="{{ asset('backend/assets/img/global/search.svg') }}" alt="icon" />
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <div class="statistics-card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                   <tr>
                                    <td>{{ Str::ucfirst($article->title) }}</td>
                                    <td>{{ Str::ucfirst($article->category->title) }}</td>
                                    <td>{!! Str::words($article->description, 20, '...') !!}</td>
                                    <td><img src="{{ $article->file->showFile ?? asset('backend/assets/img/employees/photo-1.png') }}" alt="article-image" width="50px" height="50px"></td>
                                    <td width="10%">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-outline-primary dropdown-toggle"
                                                type="button"
                                                id="dropdownMenu"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            ></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                <li>
                                                    <a
                                                        href="{{ route('admin.article.edit', $article) }}"
                                                        class="btn btn-sm btn-link w-100 text-start"
                                                        >Edit</a
                                                    >
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.article.delete', $article) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Are you sure to delete?')"
                                                            type="submit"
                                                            class="btn btn-sm btn-link w-100 text-start"
                                                        >
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        {{ $articles->links(); }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection