@extends('layouts.masterAdmin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Table Jenis Umkm</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <tbody>
                    <form action="{{route('Master Adminjenis-umkm.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <tr>
                            {{-- daftar pengguna --}}
                            <td>
                                <div class="d-flex px-5 py-1">
                                    <div class="row w-100">
                                        {{-- nama --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Jenis Umkm:</label>
                                                <input type="text" class="form-control @error('jenis_umkm') is-invalid @enderror" name="jenis_umkm" aria-label="Masukkan Jenis Umkm" autofocus>
                                                @error('jenis_umkm')
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
                                    <a href="{{route('Master Adminjenis-umkm.index')}}" class="btn btn-danger">
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