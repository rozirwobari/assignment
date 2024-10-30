@extends('dashboard.app')

@section('title', 'Berita')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-4 text-end">
                        <a href="{{ url('dashboard/addberita') }}" class="btn btn-dark mb-0 text-end">Tambah</a>
                    </div>
                    <div class="card-body pt-4 p-4">
                        @foreach ($berita as $item)

                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{ $item->judul }}</h6>
                                    <span class="mb-2 text-xs">Deskripsi : <span class="text-dark ms-sm-2 font-weight-bold">{!! $item->deskripsi !!}</span></span>
                                    <span class="text-xs">Tanggal Dibuat : <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->created_at->format('d-m-Y') }}</span></span>
                                    <span class="text-xs">Tanggal Diubah : <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->updated_at->format('d-m-Y') }}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
