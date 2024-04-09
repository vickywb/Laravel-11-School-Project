<section class="breadcrumbs">
    <div class="container">
   
      <div class="d-flex justify-content-between align-items-center">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (isset($breadcrumb['url']))
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                </li>
            @else
                <li>{{ $breadcrumb['title'] }}</li>
            </ol>
        
            @endif
        @endforeach
      </div>

    </div>
</section>