@extends('dashboard.app')

@section('title', 'Profile')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="container py-3">
                    <div class="col-12 mb-lg-0 mb-4">
                        <div class="container pt-2 text-center">
                            <div class="row justify-content-center" id="gambar-preview">
                                <div class="col-md-3 p-3">
                                    <a href="{{ asset($user->image) }}" data-lightbox="roadtrip" id="gambar-preview-link">
                                        <img src="{{ asset($user->image) }}" alt="Banner" class="img-fluid rounded-circle" id="gambar-preview-src">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('dashboard/photo_profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body py-2">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="previewGambar(this)">
                            @error('gambar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
                    <form action="{{ url('dashboard/editprofile') }}" method="POST">
                        @csrf
                        <div class="card-body py-2">
                            <label for="judul">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" value="{{ $user->name }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="deskripsi">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Password Lama</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password Lama">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Password Baru</label>
                            <input type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" id="password_baru" placeholder="Password Baru">
                            @error('password_baru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center py-2">
                            <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                        </div>
                    </form>
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

        function previewGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar-preview-src').attr('src', e.target.result);
                    $('#gambar-preview-link').attr('href', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection