@extends('home.app')

@section('title', 'Galeri')

@section('carousel')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Galeri</h4>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary text-white" style="text-decoration: underline;">Galeri</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection


@section('content')
    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
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
                            <a href="#" class="h4">Revisiting Your Investment & Distribution Goals</a>
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
                            <a href="#" class="h4">Dimensional Fund Advisors Interview with Director</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                        <div class="project-img">
                            <img src="{{ asset('home/img/blog-3.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="blog-plus-icon">
                                <a href="{{ asset('home/img/blog-3.jpg') }}" data-lightbox="blog-3" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="#" class="h4">Interested in Giving Back this year? Here are some tips</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
