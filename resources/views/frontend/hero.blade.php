<!-- ======= Hero Section ======= -->
<div id="hero">
  <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="col-12">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    @foreach ($articles as $article)
                    <div class="carousel-item active">
                        <img
                            src="{{ $article->file->showFile ?? asset('frontend/img/team/team-1.jpg') }}"
                            class="d-block w-100"
                            style="height: 564px"
                            alt="client-image"
                        />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
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
