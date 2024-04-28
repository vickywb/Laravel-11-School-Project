<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
        <h1 class="text-light">
            <a href="/">
            <span style="font-family: sans-serif">SMK 99</span>
            </a>
        </h1>
        </div>

        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
            <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('visimisi') }}">Visi dan Misi</a></li>
                    <li><a href="{{ route('guru') }}">Profile Guru</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery Sekolah</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Jurusan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach ($majors as $major)
                            <li><a href="{{ route('jurusan.sekolah', $major->slug) }}">{{ ucWords($major->title) }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="{{ route('student.register') }}">Pendaftaran</a></li>
            <li><a class="nav-link scrollto" href="{{ route('berita') }}">Berita</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
