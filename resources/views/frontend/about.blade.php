<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">
        {{-- <div class="row justify-content-between">
            <h3 data-aos="fade-up">Profile Sekolah</h3>
            <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <iframe src="" frameborder="0"></iframe>
        </div>
        <div class="col-lg-6">
            <h3 data-aos="fade-up">Voluptatem dignissimos provident quasi</h3>
            <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Ullamco laboris nisi</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
            </div>
        </div>  --}}
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
                    <h3 class="mb-3" data-aos="fade-up">Berita Terbaru</h3>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-sm-6">
                        <a href="#">
                            <h5 class="text-uppercase">{{ $article->title }}</h5>
                        </a>
                        <p style="font-size: 12px">Updated: {{ $article->created_at->diffForHumans() }}</p>
                        <p class="mt-2">{!! Str::words($article->description, 20, '.') !!} <a href="#"><br>Read More..</a></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ $article->file->showFile ?? asset('frontend/img/about-img.svg') }}" alt="new-article" width="100%">
                    </div>
                    @endforeach
                </div>

                <div class="row mt-3">
                    <div class="col col-xs-3">
                        <a href="#" class="btn btn-outline-primary">Baca Berita Lainnya..</a>
                    </div>
                </div>
            </div>
        
    </div>
</section>
<!-- End About Section -->
