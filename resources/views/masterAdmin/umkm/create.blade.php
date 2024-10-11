@extends('layouts.masterAdmin')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Table Tambahkan Data Umkm</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <tbody>
                    <form action="{{route('Master Adminumkm.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <tr>
                            {{-- daftar pengguna --}}
                            <td>
                                <div class="d-flex px-5 py-1">
                                    <div class="row w-100">
                                        {{-- pemilik --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Pemilik Umkm:</label>
                                                <input type="text" class="form-control @error('pemilik_umkm') is-invalid @enderror" name="pemilik_umkm" aria-label="Masukkan Jenis Umkm" autofocus>
                                                @error('pemilik_umkm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- umkm --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Nama Umkm:</label>
                                                <input type="text" class="form-control @error('nama_umkm') is-invalid @enderror" name="nama_umkm" aria-label="Masukkan Jenis Umkm" autofocus>
                                                @error('nama_umkm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- desa --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Desa:</label>
                                                <select class="form-control" name="id_desa">
                                                    @foreach($desa as $data)
                                                    <option value="{{$data->id}}">{{$data->nama_desa}}</option> {{--dropdown--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- jenis --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih Jenis Umkm:</label>
                                                <select class="form-control" name="id_jenis_umkm">
                                                    @foreach($jenis_umkm as $data)
                                                    <option value="{{$data->id}}">{{$data->jenis_umkm}}</option> {{--dropdown--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- alamat --}} 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Alamat:</label>
                                                <textarea name="alamat" cols="1" class="form-control @error('alamat') is-invalid @enderror" rows="6"></textarea>
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- kontak --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan kontak:</label>
                                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" aria-label="Masukkan Jenis Umkm" autofocus>
                                                @error('kontak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- keterangan --}}
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Keterangan:</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-label="Masukkan Keterangan" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="px-4 py-1">
                                    <a href="{{route('Master Adminumkm.index')}}" class="btn btn-danger">
                                        <i class="fa fa-sharp fa-light fa-arrow-left"></i>
                                    </a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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