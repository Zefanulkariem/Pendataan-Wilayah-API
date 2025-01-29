@extends('layouts.masterAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Kecamatan Keuangan UMKM</h6>
                </div>                
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <div class="filter-container">
                            <label for="kecamatan-filter">Filter:</label>
                            <div class="col-3 pb-3">
                                <form method="GET" action="{{ route('Master Adminkeuangan.menu') }}">
                                    <select class="form-control" name="filter" onchange="this.form.submit()"> {{--panggil filter--}}
                                        <option value="Semua" {{ $filter == 'Semua' ? 'selected' : '' }}>Semua</option>
                                        <option value="Disetujui" {{ $filter == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                        <option value="Ditolak" {{ $filter == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="Menunggu" {{ $filter == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama UMKM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align: right; padding-right: 11%;">Aksi</th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($uang as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td style="text-align: right;">
                                        @if ($data->status_verifikasi == 'Disetujui')
                                            <button type="button" class="btn rounded-pill btn-success" disabled>
                                                <i class="bi bi-check-circle-fill" title="Setuju"></i> Disetujui
                                            </button>
                                            <a href="{{ route('Master Adminkeuangan.show', $data->id) }}" class="btn rounded-pill btn-danger">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @elseif ($data->status_verifikasi == 'Ditolak')
                                            <button type="button" class="btn rounded-pill btn-danger" style="padding: 0.6rem 1.6rem;" disabled>
                                                <i class="bi bi-x-circle-fill" title="Tolak"></i> Ditolak
                                            </button>
                                            <a href="{{ route('Master Adminkeuangan.show', $data->id) }}" class="btn rounded-pill btn-danger">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @else
                                            <form action="{{ route('Master Adminkeuangan.reject', $data->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn rounded-pill btn-danger mx-1" type="submit">
                                                    <i class="bi bi-x-circle-fill" title="Tolak"></i> Tolak
                                                </button>
                                            </form>
                                            <form action="{{ route('Master Adminkeuangan.approve', $data->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn rounded-pill btn-success mx-1" type="submit">
                                                    <i class="bi bi-check-circle-fill" title="Setuju"></i> Setuju
                                                </button>
                                                <a href="{{ route('Master Adminkeuangan.show', $data->id) }}" class="btn rounded-pill btn-danger">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </form>
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
@endsection

@push('javascript')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

@endpush