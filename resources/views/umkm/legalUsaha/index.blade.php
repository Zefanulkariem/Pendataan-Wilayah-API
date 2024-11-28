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
                        <div class="d-flex justify-content-start px-4">
                            @php
                                $data = $legalUsaha->where('id_user', auth()->user()->id)->first();
                            @endphp

                            @if ($data)
                                <!-- Tombol untuk mengedit jika data sudah ada -->
                                <a href="{{ route('UmkmlegalUsaha.edit', $data->id) }}" class="btn btn-primary">
                                    Perbarui Legalitas Usaha <i class="fa fa-sharp fa-light fa-arrow-right"></i>
                                </a>
                            @else
                                <!-- Tombol untuk membuat data baru jika data belum ada -->
                                <a href="{{ route('UmkmlegalUsaha.create') }}" class="btn btn-primary">
                                    Tambahkan Legalitas Usaha <i class="fa fa-sharp fa-light fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-5 py-1">
                                            <div class="row w-100">
                                                {{-- output --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        @if ($legalUsaha->isNotEmpty())
                                                            @foreach ($legalUsaha as $data)
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Badan
                                                                    usaha:</label>
                                                                <span class="text-success"><i
                                                                        class="fas fa-check-circle"></i></span>
                                                                <input type="text" class="form-control mb-3"
                                                                    value="{{ $data->badan_usaha }}" disabled>
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nomor
                                                                    Induk Berusaha (NIB):</label>
                                                                <span class="text-success"><i
                                                                        class="fas fa-check-circle"></i></span>
                                                                <input type="text" class="form-control mb-3"
                                                                    value="{{ $data->NIB }}" disabled>
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Dokumen
                                                                    Akta Pendirian:</label>
                                                                @if (!empty($data) && !empty($data->akta_pendirian))
                                                                    <span class="text-success"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                    <input type="text" class="form-control mb-3"
                                                                        value="Akta Pendirian Sudah Ditambahkan"
                                                                        placeholder="Akta Pendirian Sudah Ditambahkan"
                                                                        disabled>
                                                                @else
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-circle"></i></span>
                                                                    <input type="text"
                                                                        class="form-control is-invalid mb-3"
                                                                        value="Akta Pendirian Belum Ditambahkan"
                                                                        placeholder="Akta Pendirian Belum Ditambahkan"
                                                                        disabled>
                                                                @endif
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Surat
                                                                    Keterangan Domisili Perusahaan (SKDP):</label>
                                                                @if (!empty($data) && !empty($data->SKDP))
                                                                    <span class="text-success"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                    <input type="text" class="form-control mb-3"
                                                                        value="SKDP Sudah Ditambahkan"
                                                                        placeholder="SKDP Sudah Ditambahkan" disabled>
                                                                @else
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-circle"></i></span>
                                                                    <input type="text"
                                                                        class="form-control is-invalid mb-3"
                                                                        value="SKDP Belum Ditambahkan"
                                                                        placeholder="SKDP Belum Ditambahkan" disabled>
                                                                @endif
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Dokumen
                                                                    Pajak (NPWP Usaha):</label>
                                                                @if (!empty($data) && !empty($data->NPWP))
                                                                    <span class="text-success"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                    <input type="text" class="form-control mb-3"
                                                                        value="NPWP Sudah Ditambahkan"
                                                                        placeholder="NPWP Sudah Ditambahkan" disabled>
                                                                @else
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-circle"></i></span>
                                                                    <input type="text"
                                                                        class="form-control is-invalid mb-3"
                                                                        value="NPWP Belum Ditambahkan"
                                                                        placeholder="NPWP Belum Ditambahkan" disabled>
                                                                @endif
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Surat
                                                                    Izin Usaha Perdagangan (SIUP):</label>
                                                                @if (!empty($data) && !empty($data->SIUP))
                                                                    <span class="text-success"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                    <input type="text" class="form-control mb-3"
                                                                        value="SIUP Sudah Ditambahkan"
                                                                        placeholder="SIUP Sudah Ditambahkan" disabled>
                                                                @else
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-circle"></i></span>
                                                                    <input type="text"
                                                                        class="form-control is-invalid mb-3"
                                                                        value="SIUP Belum Ditambahkan"
                                                                        placeholder="SIUP Belum Ditambahkan" disabled>
                                                                @endif
                                                                <label
                                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanda
                                                                    Daftar Perusahaan (TDP):</label>
                                                                @if (!empty($data) && !empty($data->TDP))
                                                                    <span class="text-success"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                    <input type="text" class="form-control mb-3"
                                                                        value="TDP Sudah Ditambahkan"
                                                                        placeholder="TDP Sudah Ditambahkan" disabled>
                                                                @else
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-circle"></i></span>
                                                                    <input type="text"
                                                                        class="form-control is-invalid mb-3"
                                                                        value="TDP Belum Ditambahkan"
                                                                        placeholder="TDP Belum Ditambahkan" disabled>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger"><i
                                                                    class="fas fa-exclamation-circle"></i></span>
                                                            <span class="ms-2">Harap isi data legalitas usaha terlebih
                                                                dahulu.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
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
