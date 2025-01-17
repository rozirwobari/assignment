<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title') - {{ $site->name }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="{{ asset('home/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('home/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset($site->favicon) }}">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    </head>
        @yield('style')

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid topbar px-0 d-none d-lg-block">
            <div class="container px-0">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <div class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2 text-white"></i><span style="color: #ffffffa8;">{{ $kontak->alamat }}</span></div>
                            <div class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2 text-white"></i><span style="color: #ffffffa8;">{{ $kontak->telepon }}</span></div>
                            <div class="text-muted me-0"><i class="fas fa-envelope text-primary me-2 text-white"></i><span style="color: #ffffffa8;">{{ $kontak->email }}</span></div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-facebook-f text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-twitter text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-instagram text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid sticky-top px-0">
            <div class="position-absolute bg-dark" style="left: 0; top: 0; width: 100%; height: 100%;">
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 px-4" style="border-radius: 0.8vh;">
                    <a href="{{ url('/') }}" class="navbar-brand p-0">
                        <img src="{{ asset($site->logo) }}" alt="Logo" style="width: auto; height: 45px; object-fit: cover;">
                    </a>
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                            <div class="nav-item dropdown {{ request()->is('sejarah') || request()->is('visimisi') ? 'active' : '' }}">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Kami</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ url('sejarah') }}" class="dropdown-item">Sejarah</a>
                                    <a href="{{ url('visimisi') }}" class="dropdown-item">Visi Misi</a>
                                    <a href="testimonial.html" class="dropdown-item">Tugas Dan Fungsi</a>
                                    <a href="{{ url('struktur') }}" class="dropdown-item">Struktur Organisasi</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan Publik</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Informasi Publik</a>
                                    <a href="https://www.lapor.go.id/" class="dropdown-item" target="_blank">Laporan Pengaduan</a>
                                </div>
                            </div>
                            <a href="{{ url('berita') }}" class="nav-item nav-link {{ request()->is('berita') ? 'active' : '' }}">Berita</a>
                            <a href="{{ url('pengumuman') }}" class="nav-item nav-link {{ request()->is('pengumuman') ? 'active' : '' }}">Pengumuman</a>
                            <a href="{{ url('galeri') }}" class="nav-item nav-link {{ request()->is('galeri') ? 'active' : '' }}">Galeri</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Lainnya</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ url('publikasi') }}" class="dropdown-item">Publikasi</a>
                                    <a href="{{ url('kontak') }}" class="dropdown-item">Kontak Kami</a>
                                    @if (Auth::check())
                                        <a href="{{ url('dashboard/home') }}" class="dropdown-item">Dashboard</a>
                                        <form action="{{ url('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item rzw-dropdown-item">Logout</button>
                                        </form>
                                    @else
                                        <a href="{{ url('login') }}" class="dropdown-item">Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        @yield('carousel')

        @yield('content')


        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-4 col-lg-4 col-xl-7">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">{{ $site->name }}</h4>
                                <p class="mb-3">{{ $site->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-2">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Menu Utama</h4>
                            <a href="{{ url('berita') }}"><i class="fas fa-angle-right me-2"></i> Berita</a>
                            <a href="{{ url('pengumuman') }}"><i class="fas fa-angle-right me-2"></i> Pengumuman</a>
                            <a href="{{ url('kontak') }}"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> {{ $kontak->alamat }}</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> {{ $kontak->email }}</a>
                            <a href=""><i class="fas fa-phone me-2"></i> {{ $kontak->telepon }}</a>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-light btn-md-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="{{ url('/') }}" class="border-bottom text-primary"><i class="fas fa-copyright text-white me-2"></i><span style="color: rgb(173, 173, 173);">{{ $site->name }}</span></a>, All right Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('home/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('home/lib/balkan/orgchart.js') }}"></script>
    @yield('script')

    <!-- Template Javascript -->
    <script src="{{ asset('home/js/main.js') }}"></script>
    </body>
</html>