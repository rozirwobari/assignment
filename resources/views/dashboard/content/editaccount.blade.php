@extends('dashboard.app')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mt-4">
                <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container py-3">
                            <form action="{{ url('dashboard/updateaccount') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $account->id }}">
                                <div class="card-body py-2">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama" value="{{ $account->name }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ $account->email }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-body py-2">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="previewGambar(this)">
                                    @error('gambar')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if (auth()->user()->superadmin == 2)
                                <div class="card-body py-2">
                                    <label for="role">Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                        <option value="2" {{ $account->superadmin == '2' ? 'selected' : '' }}>Super Admin</option>
                                        <option value="1" {{ $account->superadmin == '1' ? 'selected' : '' }}>Admin</option>
                                        <option value="0" {{ $account->superadmin == '0' ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif
                                <div class="col-12 mb-lg-0 mb-4">
                                    <div class="container pt-2 text-center">
                                        <div class="row justify-content-center" id="gambar-preview">
                                            <div class="col-md-3 p-3">
                                                <a href="{{ asset($account->image) }}" data-lightbox="roadtrip" id="gambar-preview-link">
                                                    <img src="{{ asset($account->image) }}" alt="Banner" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover; border-radius: 1vh;" id="gambar-preview-src">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center py-2">
                                    <a href="{{ url('dashboard/account') }}" class="btn btn-primary mb-0 text-end">Kembali</a>
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
