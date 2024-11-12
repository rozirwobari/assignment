@extends('home.app')

@section('title', 'Pengumuman')

@section('carousel')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Struktur Organisasi</h4>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary text-white" style="text-decoration: underline;">Struktur Organisasi</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection


@section('content')
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div id="tree"></div>
        </div>
    </div>
@endsection


@section('style')
    <style>
        [data-n-id] rect {
            fill: #016e25;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));
            
        }

        [data-n-id='1'] rect {
            fill: #016e25;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));
            stroke: yellow;
            stroke-width: 2;
        }
    </style>
@endsection

@section('script')
    <script>
        let struktur = @json($struktur);
        let nodes = [];
        struktur.forEach(item => {
            let node = {
                id: item.id,
                name: item.nama,
                title: item.title,
                image: "{{ asset('') }}" + item.image
            };

            if (item.pid !== null) {
                node.pid = item.pid;
            }

            nodes.push(node);
        });

        let chart = new OrgChart("#tree", {
            template: "polina",
            enableSearch: false,
            editForm: false,
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "image",
            },
            nodes: nodes,
        });
    </script>
@endsection
