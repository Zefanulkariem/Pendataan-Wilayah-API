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

                @if($data)
                    <!-- Tombol untuk mengedit jika data sudah ada -->
                    <a href="{{ route('UmkmlegalUsaha.edit', $data->id) }}" class="btn btn-primary">
                        Edit Data <i class="fa fa-sharp fa-light fa-arrow-right"></i>
                    </a>
                @else
                    <!-- Tombol untuk membuat data baru jika data belum ada -->
                    <a href="{{ route('UmkmlegalUsaha.create') }}" class="btn btn-primary">
                        <i class="fa fa-sharp fa-light fa-arrow-left"></i> Buat Data Baru
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
                                        @foreach ($legalUsaha as $data)
                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Badan usaha:</label>
                                        <input type="text" class="form-control mb-3" value="{{ $data->badan_usaha }}" disabled>
                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nomor Induk Berusaha (NIB):</label>
                                        <input type="text" class="form-control mb-3" value="{{ $data->NIB }}" disabled>
                                        @endforeach
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