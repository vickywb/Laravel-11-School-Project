@extends('layouts.app-user', [
    'headerTitle' => 'Visi dan Misi',
    'activePage' => 'VisidanMisi-index',
    'breadcrumbs' => [
        [
            'title' => 'Visi dan Misi',
            'url' => route('guru')
        ],
        [
            'title' => 'Visi dan Misi Sekolah',
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-12 section-title"><h2>VISI</h2></div>
                <div class="row mb-5">
                    <div class="col-12">
                        @foreach ($visions as $vision)
                            {!! $vision->vision !!}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 section-title"><h2>MISI</h2></div>
                <div class="row">
                    <div class="col-12">
                           <ol>
                            @foreach ($missions as $mission)
                                <li style="padding-top: 5px">{!! $mission->mission !!}</li>
                            @endforeach
                           </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection