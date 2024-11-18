@extends('layouts.masterAdmin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Table Pengguna</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <tbody>
                    <form action="{{route('Master Adminkepemilikan-umkm.update', $pk->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <tr>
                            <td>
                                <div class="d-flex px-5 py-1">
                                    <div class="row w-100">
                                      {{-- nama --}}
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Nama Kepemilikan Umkm:</label>
                                            <select class="form-control" name="id_user">
                                              <option value="pilih pemilik umkm">- Pilih pemilik umkm -</option>
                                              @foreach($idUser as $data)
                                              <option value="{{ $data->id }}" {{ $pk->id_user == $data->id ? 'selected' : '' }}>
                                                {{ $data->name }}
                                              </option>
                                              @endforeach
                                          </select>
                                          </div>
                                      </div>
                                      {{-- kontak --}}
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan Nomor Telpon:</label>
                                              <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak', $pk->kontak)}}"
                                              oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="12"> 
                                              @error('kontak')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                      </div>
                                      {{-- desa --}}
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih Desa:</label>
                                              <select class="form-control" name="id_desa">
                                                <option value="pilih pemilik umkm">- Pilih desa -</option>
                                                  @foreach($desa as $data)
                                                  <option value="{{ $data->id }}" {{ $pk->id_desa == $data->id ? 'selected' : '' }}>{{$data->nama_desa}}</option> {{--dropdown--}}
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      {{-- alamat --}}
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alamat Tinggal:</label>
                                          <textarea name="alamat" class="text-dark form-control summernote @error('alamat') is-invalid @enderror" rows="7"></textarea>
                                          @error('alamat')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="px-4 py-1">
                                    <a href="{{route('Master Adminkepemilikan-umkm.index')}}" class="btn btn-danger">
                                        <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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