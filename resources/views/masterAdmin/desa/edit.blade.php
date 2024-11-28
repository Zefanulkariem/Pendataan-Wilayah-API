@extends('layouts.masterAdmin')
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
                                <form action="{{ route('Master Admindesa.update', $desa->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- desa --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Nama Desa</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_desa') is-invalid @enderror"
                                                                name="nama_desa"
                                                                value="{{ old('desa', $desa->nama_desa) }}">
                                                            @error('nama_desa')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- jenis --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih
                                                                Kecamatan:</label>
                                                            <select class="form-control" name="id_kecamatan"
                                                                value="{{ old('desa', $desa->id_kecamatan) }}">
                                                                @foreach ($kecamatan as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        @if (old('id_kecamatan', $desa->id_kecamatan) == $data->id) selected @endif>
                                                                        {{ $data->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('Master Admindesa.index') }}" class="btn btn-danger">
                                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                                </a>
                                                <button type="submit" class="btn btn-success">Perbarui</button>
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
