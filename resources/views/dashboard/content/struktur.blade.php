@extends('dashboard.app')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <div id="tree-container">
                            <div id="tree"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="container py-3">
                        <form action="{{ url('dashboard/struktur') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-2">
                                <label for="judul">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-body py-2">
                                <label for="deskripsi">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    name="jabatan" id="jabatan" placeholder="Jabatan">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-body py-2">
                                <label for="judul">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" id="foto" placeholder="Foto">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-body py-2">
                                <label for="parent_id">Parent ID</label>
                                <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id"
                                    id="parent_id">
                                    <option value="">Pilih Parent ID</option>
                                    @foreach ($struktur as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
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
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="container-fluid">
                        <div class="card-header pb-0">
                            <h6>Struktur List</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="width: 3%">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Akun</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jabatan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Parent</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($struktur as $item)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->id }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <a href="{{ asset($item->image) }}" data-lightbox="roadtrip">
                                                                <img src="{{ asset($item->image) }}"
                                                                    class="avatar avatar-sm me-3" alt="user1">
                                                            </a>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $item->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->title }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->pid ? $item->pid : 'Tidak Ada' }}</span>
                                                </td>
                                                <td class="align-middle text-center text-center">
                                                    <button type="button" class="font-weight-bold btn btn-danger"
                                                        onclick="hapusStruktur({{ $item->id }})">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <style>
        [data-n-id] rect {
            fill: #016e25;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));

        }

        [data-n-id='1'] rect {
            fill: #016e25;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));
            stroke: yellow;
            stroke-width: 2;
        }

        #tree-container {
            position: relative;
            height: auto;
            overflow: hidden;
        }

        #tree {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
        }
    </style>
@endsection

@section('script')
    <script>
        let struktur = @json($struktur);
        let nodes = [];
        struktur.forEach(item => {
            let node = {
                id: item.id,
                name: item.nama,
                title: item.title,
                image: "{{ asset('') }}" + item.image
            };

            if (item.pid !== null) {
                node.pid = item.pid;
            }

            nodes.push(node);
        });

        let chart = new OrgChart("#tree", {
            template: "polina",
            enableSearch: false,
            editForm: false,
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "image",
            },
            nodes: nodes,
        });

        @if (session('alert'))
            Swal.fire({
                title: "{{ session('alert')['title'] }}",
                text: "{{ session('alert')['message'] }}",
                icon: "{{ session('alert')['type'] }}"
            });
        @endif

        function hapusStruktur(id) {
            Swal.fire({
                title: "Hapus Akun?",
                text: "Akun akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: `{{ url('dashboard/destroystruktur') }}`,
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(data) {
                            if (data.success) {
                                location.reload();
                            } else {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Gagal Menghapus Akun.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Gagal Menghapus Akun.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
