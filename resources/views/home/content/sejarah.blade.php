@extends('home.app')

@section('title', 'Pengumuman')

@section('carousel')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Sejarah</h4>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary text-white" style="text-decoration: underline;">Sejarah</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection


@section('content')
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident nisi veniam quibusdam suscipit corrupti praesentium vitae obcaecati dolores, repellat molestias ducimus quos reiciendis iusto laborum facere, vero ab. Placeat corrupti velit, expedita voluptatem reprehenderit in, itaque beatae consequatur ex asperiores perferendis labore. Culpa quasi veniam rerum iure natus, eaque, ipsam nobis ut nemo voluptate cupiditate. Maxime, rem quo! Laborum laudantium praesentium sed alias excepturi inventore obcaecati sunt, reiciendis eaque fugiat voluptate maxime mollitia consectetur doloribus pariatur incidunt voluptatibus fugit dicta officia dolore porro totam? Eaque saepe aperiam, itaque dolore esse repellat! Earum, neque suscipit porro soluta vitae reprehenderit eos sequi facilis cum accusantium. Illum totam dolore, libero explicabo dolorem, porro quia neque animi accusantium adipisci voluptates esse perspiciatis voluptatum praesentium deserunt voluptas, vero atque. Quo minus rem, nihil quos omnis dolores facere veniam? Aperiam labore necessitatibus temporibus, cupiditate consequuntur cumque nulla maxime modi expedita inventore esse error laborum perspiciatis deleniti.</p>
        </div>
    </div>
@endsection
