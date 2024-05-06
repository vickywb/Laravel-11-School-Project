@extends('layouts.app-user', [
    'headerTitle' => 'Major',
    'activePage' => 'Major-index',
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

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')

<div class="container">

  <div class="row">
        <div class="col-md-4">
            <div class="card-body">
                <div class="row">
                    <img src="{{ $major->file->showFile ?? asset('noimage/no-image.png') }}" alt="image-jurusan" class="major-image">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="section-title text-center"><h2>{{ strtoupper($major->title) }}</h2></div>
            <div class="card-body">
                {!! $major->description !!}
            </div>
           </div>
        </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
        <div class="major-title text-center">Materi Yang Diajarkan</div>
        <hr style="width: 70%">
        <div class="card-body">
           <div class="row major-span">
                <ol>
                    @foreach ($learnedMaterials as $learnedMaterial)
                        <li>{{ $learnedMaterial->title }}</li>
                    @endforeach
                </ol>
           </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="major-title text-center">Bidang Kerja</div>
        <hr style="width: 70%">
        <div class="card-body">
            <div class="row major-span">
                <ol>
                    @foreach ($fieldOfWorks as $fieldOfWork)
                        <li>{{ $fieldOfWork->title }}</li>
                    @endforeach
                </ol>
         </div>
        </div>
    </div>
    
  </div>
</div>
@endsection