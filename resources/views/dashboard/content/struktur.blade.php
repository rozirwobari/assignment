@extends('dashboard.app')

@section('title', 'Struktur Organisasi')

@section('content')
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
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="deskripsi">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Jabatan">
                            @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="judul">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" placeholder="Foto">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body py-2">
                            <label for="parent_id">Parent ID</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                                <option value="">Pilih Parent ID</option>
                                @foreach($struktur as $item)
                                    @if($item->pid == null)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
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
    </script>

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
