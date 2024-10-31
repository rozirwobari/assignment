@extends('dashboard.app')

@section('title', 'Dashboard')

@section('content')
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
        <div class="col-6 mb-lg-0 mb-4">
            <div class="col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container pt-5 text-center">
                        <a href="{{ asset($site->favicon) }}" data-lightbox="roadtrip">
                            <img src="{{ asset($site->favicon) }}" alt="Favivon" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover; border-radius: 1vh;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="{{ url('dashboard/favicon') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Favicon</label>
                                <input type="file" name="favicon" id="favicon" class="form-control">
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
                    </div>
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
                                <input type="hidden" name="id_banner" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-primary mt-3">Hapus</button>
                            </form>
                        </div>
                        @endforeach
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
