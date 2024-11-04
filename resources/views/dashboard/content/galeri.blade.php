@extends('dashboard.app')

@section('title', 'Galeri')

@section('content')
    <div class="col-12 mt-4"></div>
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-1">Galeri</h6>
                <p class="text-sm">Galeri Aktivitas Yang Anda Lakukan</p>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 p-3">
                        <a href="{{ url('dashboard/addgaleri') }}">
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <i class="fa fa-plus text-secondary mb-3"></i>
                                    <h5 class=" text-secondary"> Tambah Gambar/Video </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    @foreach ($galeri as $item)
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 p-3">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                @if(pathinfo($item->img, PATHINFO_EXTENSION) == 'mp4')
                                    <a class="d-block" data-fancybox="video-gallery-{{ $item->id }}" href="{{ asset("$item->img") }}">
                                        <video class="img-fluid shadow border-radius-md" style="object-fit: cover; height: 250px; width: 100%;">
                                            <source src="{{ asset("$item->img") }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </a>
                                @else
                                    <a class="d-block" data-lightbox="roadtrip" href="{{ asset("$item->img") }}">
                                        <img src="{{ asset("$item->img") }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-md" style="object-fit: cover; height: 250px; width: 100%;">
                                    </a>
                                @endif
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-secondary mb-0 text-sm pb-2"><strong>{{ $item->created_at->format('d M Y | H:i:s') }}</strong></p>
                                <p class="mb-2 text-sm">
                                    {{ Str::limit($item->deskripsi, 200, '...') }}
                                </p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ url('dashboard/editgaleri/' . $item->id) }}" type="button" class="btn btn-primary btn-sm mb-0 m-2">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm mb-0 m-2" onclick="deletegaleri({{ $item->id }})">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
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
        
        function deletegaleri(id) {
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu Tidak Akan Bisa Mengembalikan Data Ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('dashboard/deletegaleri') }}",
                        type: "POST",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    text: "Gagal Menghapus Galeri",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error: ' + error);
                            Swal.fire({
                                title: "Gagal",
                                text: "Gagal Menghapus Galeri",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection


