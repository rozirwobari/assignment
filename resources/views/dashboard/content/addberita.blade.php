@extends('dashboard.app')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mt-4">
                <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container py-3">
                            <form action="{{ url('dashboard/namedesk') }}" method="POST">
                                @csrf
                                <div class="card-body py-2">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="{{ $site->name }}">
                                </div>
                                <div class="card-body py-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Website">{{ $site->deskripsi }}</textarea>
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
