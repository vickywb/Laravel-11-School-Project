@extends('layouts.app-admin')

@section('title', 'Admin Dashboard - Major Detail')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">Major Detail</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h2 class="content-title mb-4">Learned Material</h2>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.learnedMaterial.create', $major) }}" class="btn btn-sm btn-primary me-2">Add New</a>
                </div>
            </div>

            <div class="col-12">
                <div class="statistics-card mb-0">
                    <div class="row">
                        <div class="col-12 px-1">
                            <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                <tbody>
                                    @foreach ($major->learnedMaterial as $learnedMaterial)
                                    <tr>
                                        <td class="col-11">
                                            {{ $learnedMaterial->title }}
                                        </td>
                                        <td class="col-1">
                                            <form action="{{ route('admin.learnedMaterial.delete', [$major, $learnedMaterial]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure to delete?')"
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-between">
                <h2 class="content-title mb-4">Learned Material</h2>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.fieldOfWork.create', $major) }}" class="btn btn-sm btn-primary me-2">Add New</a>
                </div>
            </div>

            <div class="col-12">
                <div class="statistics-card mb-0">
                    <div class="row">
                        <div class="col-12 px-1">
                            <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                <tbody>
                                    @foreach ($major->fieldOfWork as $fieldOfWork)
                                    <tr>
                                        <td class="col-11">
                                            {{ $fieldOfWork->title }}
                                        </td> 
                                        <td class="col-1">
                                            <form action="{{ route('admin.fieldOfWork.delete', [$major, $fieldOfWork]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure to delete?')"
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection