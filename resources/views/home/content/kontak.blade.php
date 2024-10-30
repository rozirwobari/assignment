@extends('home.app')

@section('title', 'Pengumuman')

@section('carousel')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kontak</h4>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary text-white" style="text-decoration: underline;">Kontak</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection


@section('content')
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="contact-item">
                        <div class="pb-5">
                            <h1 class="display-4 mb-4">Hubungi Kami</h1>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary btn-lg-square rounded-circle p-4"><i class="fa fa-home text-white"></i></div>
                            <div class="ms-4">
                                <h4>Alamat</h4>
                                <p class="mb-0">{{ $kontak->alamat }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary btn-lg-square rounded-circle p-2"><i class="fa fa-phone-alt text-white"></i></div>
                            <div class="ms-4">
                                <h4>Mobile</h4>
                                <p class="mb-0">{{ $kontak->telepon }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary btn-lg-square rounded-circle p-2"><i class="fa fa-envelope-open text-white"></i></div>
                            <div class="ms-4">
                                <h4>Email</h4>
                                <p class="mb-0">{{ $kontak->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <form method="POST" action="{{ url('/kontak') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Kamu" value="{{ old('name') }}">
                                    <label for="name">Nama Kamu</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Kamu" value="{{ old('email') }}">
                                    <label for="email">Email Kamu</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Subjek" value="{{ old('subject') }}">
                                    <label for="subject">Subjek</label>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Tulis Pesan Kamu" id="message" name="message" style="height: 160px">{{ old('message') }}</textarea>
                                    <label for="message">Masukan Pesan</label>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded h-100">
                        <iframe class="rounded-top w-100" 
                        style="height: 500px; margin-bottom: -6px;" src="{{ $kontak->maps }}" 
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-bottom p-4">
                            <div class="d-flex">
                                <a class="btn btn-dark btn-lg-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        @if (session('alert'))
            Swal.fire({
                title: "{{ session('alert')['title'] }}",
                text: "{{ session('alert')['message'] }}",
                icon: "{{ session('alert')['type'] }}"
            });
        @endif
    </script>
@endsection