@extends('layouts.umkm')
@section('content')

<div class="row">
<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
        <h6>Tambah Data Keuangan</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                <form action="{{route('Umkmkeuangan.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <tr>
                        {{-- daftar pengguna --}}
                        <td>
                            <div class="d-flex px-5 py-1">
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih Bulan:</label>
                                            <select name="bulan" class="form-control" required>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            @error('bulan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih Tahun:</label>
                                            <select name="tahun" class="form-control" required>
                                                @for ($tahun = date('Y'); $tahun <= date('Y') + 50; $tahun++)
                                                    <option value="{{$tahun}}">{{$tahun}}</option>
                                                @endfor
                                            </select>
                                            @error('tahun')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan Income:</label>
                                            <input type="number" class="form-control @error('income') is-invalid @enderror" name="income" placeholder="Masukkan nominal income, contoh: Rp 10.000" aria-label="Masukkan income" required>
                                            @error('income')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan Outcome:</label>
                                            <input type="number" class="form-control @error('outcome') is-invalid @enderror" name="outcome" placeholder="Masukkan nominal outcome, contoh: Rp 5.000" aria-label="Masukkan outcome" required>
                                            @error('outcome')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-1">
                                <a href="{{route('Umkmhome')}}" class="btn btn-danger">
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

{{-- cleave.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    new Cleave('#income', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        prefix: 'Rp ',
        rawValueTrimPrefix: true
    });
    new Cleave('#outcome', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        prefix: 'Rp ',
        rawValueTrimPrefix: true
    });
</script>

@endsection
