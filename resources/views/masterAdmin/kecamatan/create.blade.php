@extends('layouts.masterAdmin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Kecamatan Kabupaten Bandung</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <form action="{{ route('Master Adminkecamatan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- nama --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Nama Kecamatan:</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                                                name="nama_kecamatan" aria-label="Masukkan Nama Kecamatan"
                                                                autofocus>
                                                            <small style="color: red"><b>PERHATIAN</b>: Ini berlaku jika Pemerintah Pusat
                                                                menyetujui adanya Kecamatan baru.</small>
                                                            @error('nama_kecamatan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('Master Adminkecamatan.index') }}" class="btn btn-danger">
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
