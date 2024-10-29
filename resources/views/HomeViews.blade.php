<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $data['title']  }} - {{ config('app.name', 'RZW Website') }}</title>
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


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    </head>

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
                            <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i><span style="color: #ffffffa8;">Find A Location</span></a>
                            <a href="#" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i><span style="color: #ffffffa8;">+01234567890</span></a>
                            <a href="#" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i><span style="color: #ffffffa8;">Example@gmail.com</span></a>
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
                    <a href="index.html" class="navbar-brand p-0">
                        <h1 class="text-primary m-0"><i class="fas fa-donate me-3"></i>LOGO</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Kami</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Sejarah</a>
                                    <a href="team.html" class="dropdown-item">Visi Misi</a>
                                    <a href="testimonial.html" class="dropdown-item">Tugas Dan Fungsi</a>
                                    <a href="faqs.html" class="dropdown-item">Struktur Organisasi</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan Publik</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Informasi Publik</a>
                                    <a href="team.html" class="dropdown-item">Laporan Pengaduan</a>
                                </div>
                            </div>
                            <a href="service.html" class="nav-item nav-link">Berita</a>
                            <a href="service.html" class="nav-item nav-link">Pengumuman</a>
                            <a href="service.html" class="nav-item nav-link">Galeri</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Lainnya</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Publikasi</a>
                                    <a href="blog.html" class="dropdown-item">Kontak Kami</a>
                                    <a href="team.html" class="dropdown-item">Login Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <div class="header-carousel-item-img-1">
                    <img src="{{ asset('home/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-start p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">The most prestigious Investments company in worldwide.</h1>
                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Apply Now</a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item mx-auto">
                <div class="header-carousel-item-img-2">
                    <img src="{{ asset('home/img/carousel-2.jpg') }}  " class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-center p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">The most prestigious Investments company in worldwide.</h1>
                        <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Apply Now</a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <div class="header-carousel-item-img-3">
                    <img src="{{ asset('home/img/carousel-3.jpg') }}" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-end p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">The most prestigious Investments company in worldwide.</h1>
                        <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Apply Now</a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-fluid about bg-light py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="about-img">
                            {{-- <img src="{{ asset('home/img/about-3.png') }}" class="img-fluid w-100 rounded-top bg-white" alt="Image"> --}}
                            <img src="{{ asset('home/img/about-2.jpg') }}" class="img-fluid w-100 rounded-bottom" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                        <h4 class="text-primary">Welcome</h4>
                        <h1 class="display-5 mb-4">Selamat Datang Di Website ...</h1>
                        <p class="text ps-4 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae quaerat pariatur repudiandae, incidunt a sint sequi provident odit, culpa est harum veritatis natus? Qui adipisci id neque reiciendis eaque quasi cumque animi tenetur inventore praesentium voluptatibus illum, esse laboriosam dolores alias veniam voluptates soluta laudantium. Adipisci unde possimus molestias sunt nisi, quae repellat deleniti nam ipsa magnam iure quo magni aperiam corporis laudantium beatae ratione ea? Nulla, velit! Impedit molestiae, accusantium aspernatur sint consequatur voluptatum nisi vel quas non earum. Natus doloremque quidem id facilis inventore dignissimos sequi non dicta amet repellat cumque voluptates autem asperiores saepe eos mollitia debitis, aspernatur minima quibusdam nihil quisquam sapiente eius? Earum, maiores. Blanditiis exercitationem maxime similique ex quia ullam quasi consequatur, natus harum facere. Eligendi, qui sunt rem totam laboriosam eum temporibus, facere veniam ipsa animi iste eaque maiores accusantium sequi ad placeat quam sint deserunt! Ratione autem impedit numquam nam excepturi beatae?</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        <!-- Team Start -->
        <div class="container-fluid team py-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Pegawai</h4>
                    <h1 class="display-4">Pegawai Kami</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded">
                            <div class="team-img">
                                <img src="{{ asset('home/img/team-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fas fa-share-alt"></i></a>
                                    <div class="team-icon-share">
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-0" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content bg-dark text-center rounded-bottom p-4">
                                <div class="team-content-inner rounded-bottom">
                                    <h4 class="text-white">Mark D. Brock</h4>
                                    <p class="text-muted mb-0">CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded">
                            <div class="team-img">
                                <img src="{{ asset('home/img/team-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fas fa-share-alt"></i></a>
                                    <div class="team-icon-share">
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-0" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content bg-dark text-center rounded-bottom p-4">
                                <div class="team-content-inner rounded-bottom">
                                    <h4 class="text-white">Mark D. Brock</h4>
                                    <p class="text-muted mb-0">CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded">
                            <div class="team-img">
                                <img src="{{ asset('home/img/team-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fas fa-share-alt"></i></a>
                                    <div class="team-icon-share">
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-0" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content bg-dark text-center rounded-bottom p-4">
                                <div class="team-content-inner rounded-bottom">
                                    <h4 class="text-white">Mark D. Brock</h4>
                                    <p class="text-muted mb-0">CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded">
                            <div class="team-img">
                                <img src="{{ asset('home/img/team-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fas fa-share-alt"></i></a>
                                    <div class="team-icon-share">
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-0" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content bg-dark text-center rounded-bottom p-4">
                                <div class="team-content-inner rounded-bottom">
                                    <h4 class="text-white">Mark D. Brock</h4>
                                    <p class="text-muted mb-0">CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <div class="container-fluid testimonial bg-light py-5">
            <div class="container py-5">
                <div class="row g-4 text-center align-items-center justify-content-center">
                    <div class="col-sm-3">
                        <div class="bg-primary rounded p-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">32</span>
                                <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">k+</h4>
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <p class="text-white mb-0">Project Complete</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-dark rounded p-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value fs-1 fw-bold text-white" data-toggle="counter-up">21</span>
                                <h4 class="text-white fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <p class="mb-0">Years Of Experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-primary rounded p-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">97</span>
                                <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <p class="text-white mb-0">Team Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-primary rounded p-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">97</span>
                                <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <p class="text-white mb-0">Team Members</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Berita</h4>
                    <h1 class="display-4">Berita Terbaru</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Investment</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ asset('home/img/blog-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ asset('home/img/blog-1.jpg') }}" data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Revisiting Your Investment & Distribution Goals</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Business</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ asset('home/img/blog-2.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ asset('home/img/blog-2.jpg') }}" data-lightbox="blog-2" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Dimensional Fund Advisors Interview with Director</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url({{ asset('home/img/bg.png') }});">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Consulting</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ asset('home/img/blog-3.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ asset('home/img/blog-3.jpg') }}" data-lightbox="blog-3" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Interested in Giving Back this year? Here are some tips</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

        <!-- Services Start -->
        <div class="container-fluid service pb-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Galeri</h4>
                    <h1 class="display-4">Foto Terbaru</h1>
                </div>
                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ asset('home/img/service-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Business Strategy Invesments</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                                    </p>
                                    <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ asset('home/img/service-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Consultancy & Advice</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                                    </p>
                                    <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ asset('home/img/service-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Invesments Planning</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                                    </p>
                                    <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ asset('home/img/service-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Private Client Investment</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                                    </p>
                                    <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->



        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-4 col-lg-4 col-xl-7">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Newsletter</h4>
                                <p class="mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-2">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Menu Utama</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Berita</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Pengumuman</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
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
                        <span class="text-body"><a href="#" class="border-bottom text-primary"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('home/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/lib/lightbox/js/lightbox.min.js') }}"></script>
    

    <!-- Template Javascript -->
    <script src="{{ asset('home/js/main.js') }}"></script>
    </body>

</html>