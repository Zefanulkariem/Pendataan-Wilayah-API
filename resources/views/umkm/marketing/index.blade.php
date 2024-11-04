@extends('layouts.umkm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    {{-- ini namanya library carbon buat ngatur date --}}
                    <h6>Tenaga Kerja Operasional ({{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }})</h6>  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="d-flex justify-content-end px-4">
                            <a href="{{route('Umkmmarketing.create')}}" class="btn btn-primary">Tambahkan Data</a>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posisi Karyawan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Karyawan
                                    </th>
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role --}}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                {{-- @foreach ($op as $data) --}}
                                    <tr>
                                        {{-- nomor urut --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- daftar posisi kar --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- <h6 class="mb-0 text-sm">{{ $data->karyawan }}</h6> --}}
                                                    {{-- <p class="text-xs text-secondary mb-0">{{ $data->jml_karyawan }}</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- daftar jml kar --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- <h6 class="mb-0 text-sm">{{ $data->jml_karyawan }}</h6> --}}
                                                    {{-- <p class="text-xs text-secondary mb-0">{{ $data->jml_karyawan }}</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
