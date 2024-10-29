@extends('dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="col-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Nama Website</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Website">
                            </div>
                            <div class="card-body py-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Website"></textarea>
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Visi</label>
                                <textarea name="visi" id="visi" class="form-control" placeholder="Visi"></textarea>
                            </div>
                            <div class="card-body py-2">
                                <label for="judul">Misi</label>
                                <textarea name="misi" id="misi" class="form-control" placeholder="Misi"></textarea>
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-dark mb-0 text-end">Simpan</button>
                            </div>
                        </form>
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
