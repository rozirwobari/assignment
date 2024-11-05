@extends('dashboard.app')

@section('title', 'Tambah Gambar')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mt-4">
                <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container py-3">
                            <form action="{{ url('dashboard/updategaleri') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_galeri" id="id_galeri" value="{{ $galeri->id }}">
                                <div class="card-body py-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Website">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="gambar">Gambar/Video</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" accept=".jpeg, .png, .jpg, .gif, .svg, .mp4, .avi">
                                    @error('gambar')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div id="gambar-preview" class="d-flex justify-content-center">
                                            @if(pathinfo($galeri->img, PATHINFO_EXTENSION) == 'mp4')
                                                <video controls class="img-fluid shadow border-radius-md" style="object-fit: cover; height: auto; width: 50vh;">
                                                    <source src="{{ asset($galeri->img) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <a href="{{ asset($galeri->img) }}" data-lightbox="roadtrip" style="width: 400px; height: auto; object-fit: cover; border-radius: 1vh; margin: 10px;">
                                                    <img src="{{ asset($galeri->img) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-md">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center py-2">
                                    <a href="{{ url('dashboard/galeri') }}" class="btn btn-primary mb-0 text-end">Kembali</a>
                                    <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('gambar').addEventListener('change', function() {
            const files = this.files;
            const container = document.getElementById('gambar-preview');
            container.innerHTML = '';
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (files[i].type.includes('image')) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px';
                        img.style.height = '200px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '1vh';
                        img.style.margin = '10px';
                        const div = document.createElement('div');
                        const a = document.createElement('a');
                        a.href = e.target.result;
                        a.setAttribute('data-lightbox', 'roadtrip');
                        a.appendChild(img);
                        div.appendChild(a);
                        container.appendChild(div);
                    } else if (files[i].type.includes('video')) {
                        const video = document.createElement('video');
                        video.src = e.target.result;
                        video.style.width = '50vh';
                        video.style.height = 'auto';
                        video.style.objectFit = 'cover';
                        video.style.borderRadius = '1vh';
                        video.style.margin = '10px';
                        video.autoplay = true;
                        video.loop = true;
                        video.muted = true;
                        video.playsInline = true;
                        container.appendChild(video);
                    }
                };
                reader.readAsDataURL(files[i]);
            }
        });
    </script>
@endsection
