@extends('dashboard.app')

@section('title', 'Kontak')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="container py-3">
                    <form action="{{ url('dashboard/kontak') }}" method="POST">
                        @csrf
                        <div class="card-body py-2">
                            <label for="judul">Telepon</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="telepon" placeholder="Telepon" value="{{ $kontak->telepon }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="deskripsi">WhatsApp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" id="whatsapp" placeholder="WhatsApp" value="{{ $kontak->whatsapp }}">
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">{{ $kontak->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ $kontak->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Embed Google Maps</label>
                            <input type="text" class="form-control @error('maps') is-invalid @enderror" name="maps" id="maps" placeholder="Maps" value="{{ $kontak->maps }}">
                            @error('maps')
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
    </script>
@endsection
