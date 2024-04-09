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

    <div id="main">
        
      @include('components.breadcrumb')

      <section class="inner-page">
        <div class="container">
          
            @yield('content')

        </div>
      </section>


        @include('frontend.footer')

    </div>

    @include('frontend.components.script')
</body>
</html>
