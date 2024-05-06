@extends('layouts.app-user', [
    'headerTitle' => 'Student',
    'activePage' => 'Student-create',
    'breadcrumbs' => [
        [
            'title' => 'Pendaftaran',
            'url' => route('form.pendaftaran')
        ],
        [
            'title' => 'Pendaftaran Murid Baru',
        ]
    ]
])

@section('title', 'Sekolah Menengah Kejuruan')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title mb-4">Form Pendaftaran Murid</h2>
        </div>

        @include('components._messages')

        <div class="col-12 statistics-card">
            <form action="{{ route('pendaftaran.murid') }}" method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">
                                    Nama
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nisn" class="mb-2">
                                    Nisn
                                    <span class="required">*</span>
                                </label>
                                <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="date_of_birth" class="mb-2">
                                    Tanggal Lahir
                                    <span class="required">*</span>
                                </label>
                                <input type="date" class="form-control" id="datetimepicker1" name="date_of_birth" value="{{ old('date_of_birth') }}" required/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="gender" class="mb-2">
                                    Jenis Kelamin
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') }}" required/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="religion" class="mb-2">
                                    Agama
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion') }}" required/>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="place_of_birth" class="mb-2">
                                    Kota Lahir
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" required/>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone_number" class="mb-2">
                                    No. Handphone
                                    <span class="required">*</span>
                                </label>
                                <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="address" class="mb-2">
                                Alamat
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required/>
                        </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="origin_of_school" class="mb-2">
                                    Asal Sekolah
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="origin_of_school" name="origin_of_school" value="{{ old('origin_of_school') }}" required/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="address_of_school" class="mb-2">
                                    Alamat Sekolah Asal
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="address_of_school" name="address_of_school" value="{{ old('address_of_school') }}" required/>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="father_name" class="mb-2">
                                    Nama Ayah
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="mother_name" class="mb-2">
                                    Nama Ibu
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="father_job" class="mb-2">
                                    Pekerjaan Ayah
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="father_job" name="father_job" value="{{ old('father_job') }}" required/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="mother_job" class="mb-2">
                                    Pekerjaan Ibu
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="mother_job" name="mother_job" value="{{ old('mother_job') }}" required/>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="phone_number_parent" class="mb-2">
                                    No. Handphone Orang Tua
                                    <span class="required">*</span>
                                </label>
                                <input type="number" class="form-control" id="phone_number_parent" name="phone_number_parent" value="{{ old('phone_number_parent') }}" maxlength="13" required/>
                            </div>
                        </div>
                    </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection