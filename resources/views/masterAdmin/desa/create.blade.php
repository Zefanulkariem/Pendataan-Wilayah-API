@extends('layouts.masterAdmin')

@section('css')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Desa Kabupaten Bandung</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <form action="{{ route('Master Admindesa.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        {{-- daftar pengguna --}}
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- nama --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Nama Desa:</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_desa') is-invalid @enderror"
                                                                name="nama_desa" aria-label="Masukkan Nama Desa" autofocus>
                                                            @error('nama_desa')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- desa --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih
                                                                Kecamatan:</label><br>
                                                            <select class="js-example-basic-single form-control"
                                                                name="id_kecamatan">
                                                                @foreach ($kecamatan as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->nama_kecamatan }}</option>
                                                                    {{-- dropdown --}}
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('Master Admindesa.index') }}" class="btn btn-danger">
                                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i> kembali
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

@push('javascript')
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
