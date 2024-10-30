@extends('dashboard.app')

@section('title', 'Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-4 text-end">
                        <a href="{{ url('dashboard/addberita') }}" class="btn btn-dark mb-0 text-end">Tambah</a>
                    </div>
                    <div class="card-body pt-4 p-4">
                        @if(count($berita) > 0)
                            @foreach ($berita as $item)
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{ $item->judul }}</h6>
                                        <span class="mb-2 text-xs">Deskripsi : <span class="text-dark ms-sm-2 font-weight-bold">{!! Str::limit($item->deskripsi, 100) !!}</span></span>
                                        <span class="text-xs">Tanggal Dibuat : <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->created_at->format('d F Y | H:i:s') }}</span></span>
                                        <span class="text-xs">Tanggal Diedit : <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->updated_at->format('d F Y | H:i:s') }}</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <button class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="deleteberita({{ $item->id }})">
                                            <i class="far fa-trash-alt me-2"></i>Delete
                                        </button>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ url('dashboard/editberita/' . $item->id) }}">
                                            <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="text-center">
                                <p>Berita Tidak Ada</p>
                            </div>
                        @endif
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

        function deleteberita(id) {
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu tidak akan dapat mengembalikan ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '/dashboard/deleteberita',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(data) {
                            if(data.success) {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Berita berhasil dihapus",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    text: "Gagal menghapus berita",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "Gagal",
                                text: "Gagal menghapus berita",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection