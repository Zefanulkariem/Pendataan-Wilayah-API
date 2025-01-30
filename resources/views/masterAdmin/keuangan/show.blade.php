@extends('layouts.masterAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Daftar Data Keuangan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            <form action="{{ route('Umkmkeuangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <tr>
                                    {{-- daftar pengguna --}}
                                    <td>
                                        <div class="d-flex px-5 py-1">
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama UMKM:</label>
                                                        <input type="text" class="form-control" value="{{ $uang->user->name }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Input Keuangan:</label>
                                                        <input type="text" class="form-control" value="{{ $uang->tanggal }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pemasukkan:</label>
                                                        <input type="text" class="form-control" value="{{ $uang->income }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pengeluaran:</label>
                                                        <input type="text" class="form-control" value="{{ $uang->outcome }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Profit/Loss:</label>
                                                        <input type="text" class="form-control" value="{{ $uang->profit_loss }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Upload Bukti Transaksi:</label>
                                                        <div class="p-0">
                                                            @foreach($uang->buktiTransaksi as $bukti)
                                                                <img src="{{ asset($bukti->gambar_bukti) }}" width="200" class="img-thumbnail">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-1">
                                            <a href="{{ route('Master Adminkeuangan.menu') }}" class="btn btn-danger">
                                                <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                            </a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection