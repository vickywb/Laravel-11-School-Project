<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6" style="border-right: 1px solid grey;padding-right:30px">
                <div class="section-title" data-aos="fade-up">
                    <h3 class="mb-3" data-aos="fade-up">Profile Sekolah</h3>
                </div>
                    <iframe id="ytplayer" type="text/html" width="100%" height="360"
                        src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"
                        frameborder="0">
                    </iframe>
                <p class="mt-3 mb-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas numquam a similique at dolorem illum dignissimos, vero sed rerum dolorum.</p>
            </div>

            <div class="col-md-6" style="padding-left: 30px">
                <div class="section-title" data-aos="fade-up">
                    <h3 class="mb-3" data-aos="fade-up" id="#berita-terbaru">Berita Terbaru</h3>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-sm-6">
                        <a href="{{ route('detail.berita', $article) }}">
                            <h5 class="text-uppercase">{{ $article->title }}</h5>
                        </a>
                        <p style="font-size: 12px">Updated: {{ $article->created_at->diffForHumans() }}</p>
                        <p class="mt-2">{!! Str::words($article->description, 20, '.') !!} <a href="{{ route('detail.berita', $article) }}"><br>Read More..</a></p>
                    </div>
             
                    <div class="col-md-6 mb-3" id="img" class="lightbox">
                        <a href="#img{{ $article->file->id ?? asset('noimage/no-image.png')}}">
                            <img src="{{ $article->file->showFile ?? asset('noimage/no-image.png') }}" alt="new-article" class="article-image">
                        </a>
                        
                        <!-- lightbox container hidden with CSS -->
                        <a href="#berita-terbaru" class="lightbox" id="img{{ $article->file->id ?? asset('noimage/no-image.png') }}">
                            <span style="background-image: url({{ $article->file->showFile ?? asset('noimage/no-image.png') }})"></span>
                        </a>
                    </div> 
                    
                    @endforeach
                </div>

                <div class="row mt-3">
                    <div class="col col-xs-3">
                        <a href="{{ route('berita') }}" class="btn btn-outline-primary">Baca Berita Lainnya..</a>
                    </div>
                </div>
            </div>
        
    </div>
</section>
<!-- End About Section -->
