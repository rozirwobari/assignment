@extends('home.app')

@section('title', 'Home')

@section('carousel')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        @foreach ($banner as $item)
        <div class="header-carousel-item">
            <div class="header-carousel-item-img-1">
                <img src="{{ asset($item['img']) }}" class="img-fluid" alt="Image" style="width: 100%; height: 100vh; object-fit: cover;">
            </div>
        </div>
        @endforeach
    </div>
    <!-- Carousel End -->
@endsection


@section('content')
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
                    <h1 class="display-5 mb-4">Selamat Datang Di {{ $site->nama }}</h1>
                    <p class="text ps-4 mb-4">{!! $site->deskripsi !!}</p>
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
                            <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">{{ $berita->count() }}</span>
                        </div>
                        <div class="w-100 d-flex align-items-center justify-content-center">
                            <p class="text-white mb-0">Berita</p>
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
                    <div class="bg-dark rounded p-4">
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


    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">Berita</h4>
                <h1 class="display-4">Berita Terbaru</h1>
            </div>
            <div class="row g-4 justify-content-center text-center">

                @foreach ($berita->take(4) as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ asset('home/img/service-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> {{ $item->judul }}</a>
                                    <p class="mb-4 text-start">
                                        {!! Str::limit($item->deskripsi, 100) !!}
                                    </p>
                                    <a class="btn btn-light rounded-pill py-2 px-4" href="{{ url('berita/' . $item->id) }}">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="col-12">
                    <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="{{ url('berita') }}">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->



    <!-- Foto Start -->
    <div class="container-fluid blog py-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">Galeri</h4>
                <h1 class="display-4">Galeri Terbaru</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                        <div class="project-img">
                            <img src="{{ asset('home/img/blog-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ asset('home/img/blog-1.jpg') }}" data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="{{ asset('home/img/blog-1.jpg') }}" data-lightbox="blog-1" class="h4">Revisiting Your Investment & Distribution Goals</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                        <div class="project-img">
                            <img src="{{ asset('home/img/blog-2.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ asset('home/img/blog-2.jpg') }}" data-lightbox="blog-2" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="{{ asset('home/img/blog-2.jpg') }}" data-lightbox="blog-2" class="h4">Dimensional Fund Advisors Interview with Director</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url({{ asset('home/img/bg.png') }});">
                        <div class="project-img">
                            <img src="{{ asset('home/img/blog-3.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ asset('home/img/blog-3.jpg') }}" data-lightbox="blog-3" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="{{ asset('home/img/blog-3.jpg') }}" data-lightbox="blog-3" class="h4">Interested in Giving Back this year? Here are some tips</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="{{ url('galeri') }}">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Foto End -->
@endsection
