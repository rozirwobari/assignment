@extends('dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="{{ url('dashboard/namedesk') }}" method="POST">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Nama Website</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Website" value="{{ $site->name }}">
                            </div>
                            <div class="card-body py-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Website">{{ $site->deskripsi }}</textarea>
                            </div>
                            <div class="card-body py-2">
                                <label for="judul">Sejarah</label>
                                <textarea name="sejarah" id="sejarah" class="form-control" placeholder="Masukan Sejarah">{{ $site->sejarah }}</textarea>
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="{{ url('dashboard/visimisi') }}" method="POST">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Visi</label>
                                <textarea name="visi" id="visi" class="form-control" placeholder="Masukan Visi">{{ $site->visi }}</textarea>
                            </div>
                            <div class="card-body py-2">
                                <label for="judul">Misi</label>
                                <textarea name="misi" id="misi" class="form-control" placeholder="Masukan Misi">{{ $site->misi }}</textarea>
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row mt-4">
            <div class="col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="{{ url('dashboard/addbanner') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Banner</label>
                                <input type="file" name="banner" id="banner" class="form-control">
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container pt-5 text-center">
                        <div class="row">
                            @foreach ($banner as $item)
                            <div class="col-md-3 p-3">
                                <a href="{{ asset($item['img']) }}" data-lightbox="roadtrip">
                                    <img src="{{ asset($item['img']) }}" alt="Banner" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                                </a>
                                <form action="{{ url('dashboard/deletebanner') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" class="btn btn-primary mt-3">Hapus</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
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
