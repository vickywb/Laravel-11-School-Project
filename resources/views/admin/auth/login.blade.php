@extends('layouts.app-login')

@section('title', 'Login Admin')
@section('content')
   <div class="container">

        <div class="row px-4 py-5 my-5 text-center">

            <h1>Login Admin</h1>

            <div class="col-md-5 mx-auto">

                <div class="alert alert-error mb-3">
                    @include('components._messages')
                </div>

                <form action="{{ route('doLogin') }}" class="p-4 p-md-5 border rounded-3 bg-light" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <button class="w-100 btn btn-lg btn-primary">Sign In</button>

                </form>

            </div>

        </div>

   </div>
@endsection