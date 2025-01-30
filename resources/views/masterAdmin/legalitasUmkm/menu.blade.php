@extends('layouts.masterAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Legalitas Usaha UMKM</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemilik UMKM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Badan Usaha</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Induk Berusaha (NIB)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="text-align: right">Aksi</th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($legalUsaha as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->badan_usaha }}</td>
                                    {{-- <td>{{ $data->akta_pendirian }}</td> --}}
                                    <td>{{ $data->NIB }}</td>
                                    {{-- <td>{{ $data->SKDP }}</td>
                                    <td>{{ $data->NPWP . 'Data Belum Ditambahkan' }}</td>
                                    <td>{{ $data->SIUP }}</td>
                                    <td>{{ $data->TDP }}</td> --}}
                                    <td style="text-align: right">
                                        <a href="{{ route('Master AdminlegalUsaha.show', $data->id) }}"
                                            class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
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