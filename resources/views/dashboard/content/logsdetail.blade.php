@extends('dashboard.app')

@section('title', 'Logs')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <div class="card">
                <h5 class="text-center pt-5">{{ $logs->description }}</h5>
                <div class="container py-3">
                    @foreach (json_decode($logs->data) as $log)
                        @if(isset($log->hr))
                            <p class="text-center"> ===============[<span class="fw-bold">{{ $log->label }}</span>]=============== </p>
                        @endif
                        @if(isset($log->value))
                            <div class="card-body py-2">
                                <label for="judul">{{ $log->label }}</label>
                                @if(is_array($log->value))
                                    <textarea class="form-control" rows="10" readonly>{{ print_r($log->value[0], true) }}</textarea>
                                @else
                                    <input type="text" class="form-control" placeholder="Value {{ $log->label }}" value="{{ $log->value }}" readonly>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="container text-center py-4">
                    <a href="{{ url('dashboard/logs') }}" class="btn btn-primary">Kembali</a>
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
