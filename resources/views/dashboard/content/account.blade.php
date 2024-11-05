@extends('dashboard.app')

@section('title', 'Manage Account')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Akun</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Super Admin</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibuat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diperbarui</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <a href="{{ asset($item->image) }}" data-lightbox="roadtrip">
                                                    <img src="{{ asset($item->image) }}" class="avatar avatar-sm me-3" alt="user1">
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $item->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm {{ $item->superadmin == '2' ? 'bg-gradient-success' : ($item->superadmin == '1' ? 'bg-gradient-primary' : 'bg-gradient-info') }}">{{ $item->superadmin == '2' ? 'Super Admin' : ($item->superadmin == '1' ? 'Admin' : 'User') }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at->format('d M Y | H:i:s') }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->updated_at->format('d M Y | H:i:s') }}</span>
                                    </td>
                                    <td class="align-middle text-center text-center">
                                        <a href="{{ url('dashboard/editaccount/' . $item->id) }}" class="font-weight-bold btn btn-primary">
                                            Edit
                                        </a>
                                        @if ($item->id != auth()->user()->id)
                                        <button type="button" class="font-weight-bold btn btn-danger" onclick="hapususers({{ $item->id }})">
                                            Hapus
                                        </button>
                                        @endif
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
@endsection


@section('script')
    <script>
        function hapususers(id) {
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
                        url: `{{ url('dashboard/deleteaccount') }}`,
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(data) {
                            if(data.success) {
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

        @if (session('alert'))
            Swal.fire({
                title: "{{ session('alert')['title'] }}",
                text: "{{ session('alert')['message'] }}",
                icon: "{{ session('alert')['type'] }}"
            });
        @endif
    </script>
@endsection
