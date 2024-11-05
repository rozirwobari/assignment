@extends('dashboard.app')

@section('title', 'Manage Account')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 text-center">
                    <h6>Data Logs</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Akun</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl dan Waktu</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($dataLogs) > 0)
                                    @foreach ($dataLogs as $logs)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <a href="{{ asset($logs['image']) }}" data-lightbox="roadtrip">
                                                        <img src="{{ asset($logs['image']) }}" class="avatar avatar-sm me-3" alt="user1">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $logs['nama'] }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $logs['email'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($logs['action'] == 'delete')
                                                <span class="badge badge-sm bg-danger">{{ $logs['action'] }}</span>
                                            @elseif($logs['action'] == 'update')
                                                <span class="badge badge-sm" style="background-color: #f0e800; color: #000;">{{ $logs['action'] }}</span>
                                            @elseif($logs['action'] == 'add')
                                                <span class="badge badge-sm" style="background-color: #007bff;">{{ $logs['action'] }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $logs['created_at']->format('d M Y | H:i:s') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $logs['description'] }}</span>
                                        </td>
                                        <td class="align-middle text-center text-center">
                                            <a href="{{ url('dashboard/detaillogs/' . $logs['id']) }}" class="font-weight-bold btn btn-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <p>Logs Tidak Ada</p>
                                        </td>
                                    </tr>
                                @endif
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
        @if (session('alert'))
            Swal.fire({
                title: "{{ session('alert')['title'] }}",
                text: "{{ session('alert')['message'] }}",
                icon: "{{ session('alert')['type'] }}"
            });
        @endif
    </script>
@endsection
