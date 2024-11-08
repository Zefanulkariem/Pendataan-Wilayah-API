@extends('layouts.investor')
@section('content')

<div class="row">
<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
        <h6>Jadwal Meeting</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                {{-- <form action="{{route('')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf --}}
                    <tr>
                        {{-- karyawan --}}
                        <td>
                            <div class="d-flex px-5 py-1">
                                <div class="row w-100">
                                <!-- <div class="card-header pb-0">
                                    <h6>meeting</h6>
                                </div> -->
                                <!-- posisi karyawan -->
                                   
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Umkm</label>
                                            <input type="text" id="pelakuumkm" class="form-control @error('pelakuumkm') is-invalid @enderror" name="pelakuumkm" placeholder="Masukkan UMKM yang anda pilih" aria-label="Masukkan UMKM yang anda pilih" autofocus>
                                            @error('pelakuumkm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                   
                                    {{-- tempat meeting --}}
                                    
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lokasi Meeting</label>
                                            <input type="text" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" placeholder="Masukkan lokasi meeting" aria-label="Masukkan lokasi meeting" autofocus>
                                            @error('karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal dan waktu meeting</label>
                                            <input type="datetime-local" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan lokasi meeting" aria-label="Masukkan lokasi meeting" autofocus>
                                            @error('karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                        
                                </div>
                            </div>
                            <div class="px-4 py-1">
                                {{-- <a href="{{route('Umkmhome')}}" class="btn btn-danger">
                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i>
                                </a> --}}
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