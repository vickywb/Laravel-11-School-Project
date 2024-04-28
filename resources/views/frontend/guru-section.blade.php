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
                        <a href="{{ route('guru') }}" class="btn btn-outline-primary">Semua Guru</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-md-3">
                    <div class="teacher-team">
                        <div class="teachcer-area">
                            <img src="{{ $teacher->file->showFile ?? asset('noimage/no-image.png') }}" alt="teacher-img" class="teacher-img">
                            <div class="teacher-title text-center">
                                <p class="mt-2">{{ $teacher->name }}</p>
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

