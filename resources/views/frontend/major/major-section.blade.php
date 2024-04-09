@extends('layouts.app-user', [
    'headerTitle' => 'Student',
    'activePage' => 'Student-create',
    'breadcrumbs' => [
        [
            'title' => 'Jurusan',
            'url' => route('jurusan.sekolah', $major->slug)
        ],
        [
            'title' => ucWords($major->slug),
        ]
    ]
])

@section('title', 'Jurusan Sekolah', $major->slug)
@section('content')

<div class="container">

  <div class="row">
        <div class="col-md-4">
            <div class="card-body">
                <div class="row">
                    <img src="{{ $major->file->showFile }}" alt="image-jurusan">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-title text-center"><h2>{{ strtoupper($major->title) }}</h2></div>
            <div class="card-body">
                {!! $major->description !!}
            </div>
           </div>
        </div>
  </div>

  <div class="row align-items-center mt-5">
    <div class="col-md-6 text-center">
        <div class="card-title">Materi Yang Diajarkan</div>
        <hr>
        <div class="card-body">
           <div class="row">
            <span>1. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            <span>2. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            <span>3. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            <span>4. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            <span>5. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            <span>6. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
           </div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <div class="card-title">Bidang Kerja</div>
        <hr>
        <div class="card-body">
            <div class="row">
            <span>1. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
             <span>2. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
             <span>3. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
             <span>4. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
             <span>5. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
             <span>6. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus, repellat!</span>
            </div>
         </div>
        </div>
    </div>
    
  </div>
</div>
@endsection