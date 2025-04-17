@extends('layouts.masterAdmin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Log Aktivitas</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-0">
                <div class="table-responsive p-5 pt-0">
                    <table id="myTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Role</th>
                                <th>Aktivitas</th>
                                <th>Deskripsi</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $index => $log)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $log->user->name ?? 'Tidak diketahui' }}</td>
                                    <td>{{ ucfirst($log->role) }}</td>
                                    <td>{{ $log->aktivitas }}</td>
                                    <td>{{ $log->deskripsi ?? '-' }}</td>
                                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada log aktivitas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush
