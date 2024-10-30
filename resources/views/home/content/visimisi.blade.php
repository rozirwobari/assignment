@extends('home.app')

@section('title', 'Pengumuman')

@section('carousel')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Visi Misi</h4>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary text-white" style="text-decoration: underline;">Visi Misi</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection


@section('content')
    <div class="container-fluid service">
        <div class="container py-5">
            <div class="pt-5">
                <h4>Visi</h4>
                <p>{!! $site->visi !!}</p>
            </div>

            <div class="pt-5">
                <h4>Misi</h4>
                <p>{!! $site->misi !!}</p>
            </div>
        </div>
    </div>
@endsection
