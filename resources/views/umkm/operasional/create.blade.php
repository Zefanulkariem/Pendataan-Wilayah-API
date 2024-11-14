@extends('layouts.umkm')
@section('content')

<div class="row">
<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
        <h6>Operasional</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                <form action="{{route('Umkmoperasional.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <tr>
                        {{-- karyawan --}}
                        <td>
                            <div class="d-flex px-5 py-1">
                                <div class="row w-100">
                                <div class="card-header pb-0">
                                    <h6>Karyawan</h6>
                                </div>
                                <!-- posisi karyawan -->
                                   {{--  <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori Posisi:</label>
                                            <input type="text" name="karyawan" class="form-control @error('karyawan') is-invalid @enderror" placeholder="Masukkan kategori posisi" aria-label="Masukkan kategori posisi" autofocus >
                                            @error('karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- jumlah karyawan --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jumlah karyawan:</label>
                                            <input type="text" name="jml_karyawan" class="form-control @error('jml_karyawan') is-invalid @enderror" placeholder="Masukkan jumlah karyawan" aria-label="Masukkan karyawan" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('jml_karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-1">
                                <a href="{{route('Umkmoperasional.index')}}" class="btn btn-danger">
                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i>
                                </a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </td>
                    </tr>
                {{-- </form> --}}
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
</div>

@endsection