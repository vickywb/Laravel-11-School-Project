<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h3 class="mb-3" style="font-weight: 700; font-size: 34px; color: #4e4039;" data-aos="fade-up">Profile Guru</h3>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex flex-row-reverse">
                <div class="row mb-3">
                    <div class="col col-xs-3">
                        <a href="#" class="btn btn-outline-primary">Semua Guru</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($teachers as $teacher)
                
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="member">
                <img src="{{ $teacher->file->showFile ?? asset('frontend/img/team/team-1.jpg') }}" class="img-fluid" alt="profile-guru">
                <div class="member-info">
                    <div class="member-info-content">
                    <h4>{{ $teacher->name }}</h4>
                    <span>{{ $teacher->field_of_study }}</span>
                    </div>
                </div>
                </div>
            </div>
            
            @endforeach
        </div>

    </div>
    </section>
<!-- End Team Section -->

