@extends('layouts.investor')

@section('css')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
                                <form action="{{ route('Investormeeting.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        {{-- karyawan --}}
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- judul meeting --}}
                                                    <div class="form-group">
                                                        <label
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Judul
                                                            Meeting:</label>
                                                        <input type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            name="judul" placeholder="Masukkan judul meeting"
                                                            aria-label="Masukkan judul meeting" autofocus>
                                                    </div>

                                                    {{-- Nama Umkm --}}
                                                    <div class="form-group">
                                                        <label
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama
                                                            Umkm:</label><br>
                                                        <select class="js-example-basic-single form-control" name="id_umkm">
                                                            <option value="pilih umkm">- Pilih Umkm -</option>
                                                            @foreach ($umkm as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    {{-- tempat meeting --}}

                                                    <div class="form-group">
                                                        <label
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lokasi
                                                            Meeting:</label>
                                                        <textarea class="text-dark form-control summernote @error('lokasi_meeting') is-invalid @enderror" name="lokasi_meeting"
                                                            rows="7"></textarea>
                                                        @error('lokasi_meeting')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- Tanggal dan Waktu Meeting --}}
                                                    <div class="form-group">
                                                        <label
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal
                                                            dan waktu Meeting:</label>
                                                        <input type="datetime-local"
                                                            class="form-control @error('tanggal') is-invalid @enderror"
                                                            name="tanggal" placeholder="Masukkan lokasi meeting"
                                                            aria-label="Masukkan tanggal meeting" autofocus>
                                                        @error('karyawan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('Investormeeting.index') }}" class="btn btn-danger">
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
