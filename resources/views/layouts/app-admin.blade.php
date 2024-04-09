<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    {{-- Style Bootstrap --}}
    @include('admin.components.includes.style')
</head>
<body>
    <div class="screen-cover d-none d-xl-none"></div>
    
    <div class="row">
        {{-- Sidebar --}}
        @include('admin.components.sidebar')
        
        @yield('content')
    </div>

    {{-- Script --}}
    @include('admin.components.includes.script')
</body>
</html>