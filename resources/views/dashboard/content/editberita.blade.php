@extends('dashboard.app')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mt-4">
                <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container py-3">
                            <form action="{{ url('dashboard/updateberita') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $berita->id }}">
                                <div class="card-body py-2">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul" value="{{ $berita->judul }}">
                                    @error('judul')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Website">{{ $berita->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar.*') is-invalid @enderror" name="gambar[]" id="gambar" multiple>
                                    @error('gambar.*')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-lg-0 mb-4">
                                    <div class="container pt-2 text-center">
                                        <div class="row" id="gambar-preview">
                                            @foreach ($gambar as $item)
                                            <div class="col-md-3 p-3">
                                                <a href="{{ asset($item->img) }}" data-lightbox="roadtrip">
                                                    <img src="{{ asset($item->img) }}" alt="Banner" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover; border-radius: 1vh;">
                                                </a>
                                                <button type="button" onclick="deleteGambar({{ $berita->id }}, {{ $item->id }})" class="btn btn-primary mt-3">Hapus</button>
                                            </div>
                                            @endforeach
                                        </div>
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
        function deleteGambar(id_berita, id_gambar) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('dashboard/deletegambar') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id_berita': id_berita,
                            'id_gambar': id_gambar
                        },
                        success: function(data) {
                            if(data.success) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Gambar Berhasil Dihapus.",
                                    icon: "success"
                                });
                                location.reload();
                            } else {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Gagal Menghapus Gambar.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Gagal Menghapus Gambar.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }


        document.getElementById('gambar').addEventListener('change', function() {
            const files = this.files;
            const container = document.getElementById('gambar-preview');
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '250px';
                    img.style.height = '250px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '1vh';
                    const div = document.createElement('div');
                    div.classList.add('col-md-3', 'p-3');
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
