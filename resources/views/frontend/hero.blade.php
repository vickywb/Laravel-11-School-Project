<!-- ======= Hero Section ======= -->
<div id="hero">
  <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="col-12">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                  <div class="carousel-inner">
                    @foreach ($heroPages as $heroPage)
                        <div class="carousel-item active">
                            <img
                                src="{{ $heroPage->file->showFile ?? asset('frontend/img/sekolah.jpg') }}"
                                class="d-block w-100"
                                style="height: 564px"
                                alt="hero-page-image"
                            />
                            <div class="carousel-caption d-md-block" style="padding-bottom: 0px; color: black">
                                <h2 style="font-size: 36px; color: black;"><b>{{ $heroPage->title ?? null }}</b></h2>
                                <p style="font-size: 18px"><b>{!! $heroPage->description ?? null !!}</b></p>
                            </div>
                        </div>
                    @endforeach
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Hero -->
