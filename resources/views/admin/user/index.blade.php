@extends('layouts.app-admin')

@section('title', 'Admin User Dashboard')
@section('content')
<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="{{ asset('backend/assets/img/global/burger.svg') }}" class="mb-2" alt="icon" />
                </button>
                <h2 class="nav-title">
                    <a href="#">User Table</a>
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">

            {{-- include success and error message --}}
            @include('components._messages')

            <div class="col-12 d-flex justify-content-between">
                <h2 class="content-title mb-4">List User</h2>
                <div class="btn mb-2 mb-md-0">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary"> Add new</a>
                </div>
            </div>

            <div class="col-12">
                <div class="statistics-card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @foreach ($user->getRoleNames() as $userRole)
                                    <td>{{ $userRole }}</td>
                                    @endforeach
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
                                                        href="{{ route('admin.user.edit', $user) }}"
                                                        class="btn btn-sm btn-link w-100 text-start"
                                                        >Edit</a
                                                    >
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.user.delete', $user) }}" method="post">
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
                        {{ $users->links(); }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection