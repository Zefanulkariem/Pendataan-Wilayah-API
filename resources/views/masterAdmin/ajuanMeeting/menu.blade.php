@extends('layouts.masterAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Ajuan Meeting</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemilik UMKM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pihak Yang Mengajukan / Investor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align: right">Aksi</th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($meeting as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $data->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->idInvestor->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $data->idInvestor->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: right">
                                        <a href="{{ route('Master Adminmeeting.show', $data->id) }}"
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