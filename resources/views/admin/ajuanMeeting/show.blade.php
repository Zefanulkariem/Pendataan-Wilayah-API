@extends('layouts.admin')
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
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            <tr>
                                {{-- daftar pengguna --}}
                                <td>
                                    <div class="d-flex px-5 py-1">
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama UMKM:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->user->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email Investor:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->user->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="py-4">Diajukan Oleh:</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Investor:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->idInvestor->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email Investor:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->idInvestor->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Judul Acara:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->judul }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Acara:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->tanggal }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lokasi Acara:</label>
                                                    <input type="text" class="form-control" value="{{ $meeting->lokasi_meeting }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-1">
                                        <a href="{{ route('Adminmeeting.menu') }}" class="btn btn-danger">
                                            <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection