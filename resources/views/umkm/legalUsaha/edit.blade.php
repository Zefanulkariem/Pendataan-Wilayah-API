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
                                <form action="{{ route('UmkmlegalUsaha.update', $legalUsaha->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- badan usaha --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah badan usaha:</label>
                                                            <select name="badan_usaha" id="badan_usaha"
                                                                class="form-control">
                                                                <option value="PT (Perseroan Terbatas)" {{ (old('badan_usaha', $legalUsaha->badan_usaha)) == 'PT (Perseroan Terbatas)' ? 'selected' : '' }}>PT (Perseroan Terbatas)</option>
                                                                <option value="CV (Persekutuan Komanditer)" {{ (old('badan_usaha', $legalUsaha->badan_usaha)) == 'CV (Persekutuan Komanditer)' ? 'selected' : '' }}>CV (Persekutuan Komanditer)</option>
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
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah Nomor Induk Berusaha (NIB):</label>
                                                            <input type="number"
                                                                class="form-control @error('NIB') is-invalid @enderror"
                                                                name="NIB" aria-label="Ubah/Tambahkan NIB"
                                                                value="{{ old('NIB', $legalUsaha->NIB) }}"
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
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah/Tambahkan Dokumen Akta Pendirian:</label>
                                                            @if($legalUsaha->akta_pendirian)
                                                                <div class="p-0">
                                                                    <img src="{{ asset('storage/legalitas/' . $legalUsaha->akta_pendirian) }}" alt="Gambar Sebelumnya" class="img-thumbnail" style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="akta_pendirian" class="form-control file-upload-info  @error('akta_pendirian') is-invalid @enderror" placeholder="Upload Dokumen">
                                                                @error('akta_pendirian')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- skdp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah/Tambahkan Surat Keterangan Domisili Perusahaan (SKDP):</label>
                                                            @if($legalUsaha->SKDP)
                                                                <div class="p-0">
                                                                    <img src="{{ asset('storage/legalitas/' . $legalUsaha->SKDP) }}" alt="Gambar Sebelumnya" class="img-thumbnail" style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="SKDP" class="form-control file-upload-info  @error('SKDP') is-invalid @enderror" placeholder="Upload Dokumen">
                                                                @error('SKDP')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- npwp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah/Tambahkan Dokumen Pajak (NPWP Usaha):</label>
                                                            @if($legalUsaha->NPWP)
                                                                <div class="p-0">
                                                                    <img src="{{ asset('storage/legalitas/' . $legalUsaha->NPWP) }}" alt="Gambar Sebelumnya" class="img-thumbnail" style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="NPWP" class="form-control file-upload-info  @error('NPWP') is-invalid @enderror" placeholder="Upload Dokumen">
                                                                @error('NPWP')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- siup --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah/Tambahkan Surat Izin Usaha Perdagangan (SIUP):</label>
                                                            @if($legalUsaha->SIUP)
                                                                <div class="p-0">
                                                                    <img src="{{ asset('storage/legalitas/' . $legalUsaha->SIUP) }}" alt="Gambar Sebelumnya" class="img-thumbnail" style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="SIUP" class="form-control file-upload-info  @error('SIUP') is-invalid @enderror" placeholder="Upload Dokumen">
                                                                @error('SIUP')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- tdp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ubah/Tambahkan Tanda Daftar Perusahaan (TDP):</label>
                                                            @if($legalUsaha->TDP)
                                                                <div class="p-0">
                                                                    <img src="{{ asset('storage/legalitas/' . $legalUsaha->TDP) }}" alt="Gambar Sebelumnya" class="img-thumbnail" style="max-width: 100px;">
                                                                </div>
                                                            @endif
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="TDP" class="form-control file-upload-info  @error('TDP') is-invalid @enderror" placeholder="Upload Dokumen">
                                                                @error('TDP')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('UmkmlegalUsaha.index') }}" class="btn btn-danger">
                                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                                </a>
                                                <button class="btn btn-success">Perbarui</button>
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
