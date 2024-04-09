<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    {{-- Style Bootstrap --}}
    @include('frontend.components.style')
</head>
<body>
    @include('frontend.navbar')

    @include('frontend.hero')

    <div id="main">
        
        @include('frontend.about')

        @include('frontend.head-master-section')

        @include('frontend.guru-section')

        @include('frontend.footer')

    </div>

    @include('frontend.components.script')
</body>
</html>
