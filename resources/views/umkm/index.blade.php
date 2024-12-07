@extends('layouts.umkm')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Dokumen Legalitas yang sudah dilengkapi</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $jmlField ?? 'Belum mengisi' }} Dokumen
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-primary text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Keuntungan/ Kerugian</p>
                                    <h5 class="font-weight-bolder">
                                        {{ number_format($rataRataPersen, 2) }}%
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Karyawan Aktif</p>
                                    
                                    <h5 class="font-weight-bolder">
                                        {{ $op->jml_karyawan ?? 'Belum mengisi' }} Karyawan
                                    </h5>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-sm mb-0 text-uppercase font-weight-bold">Selamat Datang Kembali!</h6>
                        <h5 class="font-weight-bolder">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0">
                            <span class="text-success text-sm font-weight-bolder"></span>
                            Saat ini Hari
                            <b>{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, F Y') }}</b>
                        </p>
                        <p class="mb-0">
                            Semoga harimu menyenangkan 🌟
                        </p>
                        <div class="card-body p-3">
                            <div class="chart">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2" style="float: left">Daftar Keuangan</h6>
                            <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" style="float: right" href="{{ route('Umkmkeuangan.index') }}"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <ul class="list-group p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan&Tahun</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pemasukkan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pengeluaran</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keuntungan/Kerugian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($uang as $data)
                                        <tr>
                                            <td>
                                                <div>
                                                    <div class="flex-column justify-content-center">
                                                        <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-0 py-2">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $data->bulan }}</h6>
                                                        <p class="text-xs text-secondary mb-0">Pada Tahun:
                                                            <b>{{ $data->tahun }}</b></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-0 py-2">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Rp
                                                            {{ number_format($data->income, 0, ',', '.') }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-0 py-2">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Rp
                                                            {{ number_format($data->outcome, 0, ',', '.') }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- kolom profit/loss --}}
                                            <td>
                                                <div class="px-0 py-2">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            Rp {{ number_format($data->income - $data->outcome, 0, ',', '.') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
