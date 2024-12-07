@extends('layouts.umkm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Dokumen Legalitas Usaha</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <form action="{{ route('UmkmlegalUsaha.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        {{-- daftar pengguna --}}
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- badan usaha --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan
                                                                badan usaha:</label>
                                                            <select name="badan_usaha" id="badan_usaha"
                                                                class="form-control">
                                                                <option value="PT (Perseroan Terbatas)"
                                                                    {{ old('badan_usaha') == 'PT (Perseroan Terbatas)' ? 'selected' : '' }}>
                                                                    PT (Perseroan Terbatas)</option>
                                                                <option value="CV (Persekutuan Komanditer)"
                                                                    {{ old('badan_usaha') == 'CV (Persekutuan Komanditer)' ? 'selected' : '' }}>
                                                                    CV (Persekutuan Komanditer)</option>
                                                            </select>
                                                            @error('badan_usaha')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- nib --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan
                                                                Nomor Induk Berusaha (NIB):</label>
                                                            <input type="number"
                                                                class="form-control @error('NIB') is-invalid @enderror"
                                                                name="NIB" aria-label="Masukkan NIB" autofocus
                                                                value="{{ old('NIB') }}"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                            @error('NIB')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- akta pendirian --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan
                                                                Dokumen Akta Pendirian:</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="akta_pendirian"
                                                                    class="form-control file-upload-info"
                                                                    placeholder="Upload Dokumen">
                                                            </div>
                                                            @error('akta_pendirian')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- skdp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan
                                                                Surat Keterangan Domisili Perusahaan (SKDP):</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="SKDP"
                                                                    class="form-control file-upload-info"
                                                                    placeholder="Upload Dokumen">
                                                            </div>
                                                            @error('SKDP')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- npwp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Dokumen Pajak (NPWP Usaha):</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="NPWP"
                                                                    class="form-control file-upload-info"
                                                                    placeholder="Upload Dokumen">
                                                            </div>
                                                            @error('NPWP')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- siup --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Surat Izin Usaha Perdagangan (SIUP):</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="SIUP"
                                                                    class="form-control file-upload-info"
                                                                    placeholder="Upload Dokumen">
                                                            </div>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- tdp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                                Tanda Daftar Perusahaan (TDP):</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="TDP"
                                                                    class="form-control file-upload-info"
                                                                    placeholder="Upload Dokumen">
                                                            </div>
                                                            @error('TDP')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('UmkmlegalUsaha.index') }}" class="btn btn-danger">
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
