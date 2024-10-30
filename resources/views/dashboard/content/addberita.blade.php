@extends('dashboard.app')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mt-4">
                <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container py-3">
                            <form action="{{ url('dashboard/addberita') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body py-2">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul" value="{{ old('judul') }}">
                                    @error('judul')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Website">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar[]" id="gambar" multiple>
                                    @error('gambar')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div id="gambar-preview" class="d-flex justify-content-center"></div>
                                    </div>
                                </div>
                                <div class="text-center py-2">
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
                };
                reader.readAsDataURL(files[i]);
            }
        });
    </script>
@endsection
