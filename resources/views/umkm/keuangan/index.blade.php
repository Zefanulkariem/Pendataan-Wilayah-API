@extends('layouts.umkm')
@section('content')

<div class="row">
<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
        <h6>Keuangan</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                {{-- <form action="{{route('')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf --}}
                    <tr>
                        {{-- daftar pengguna --}}
                        <td>
                            <div class="d-flex px-5 py-1">
                                <div class="row w-100">
                                <div class="card-header pb-0">
                                    <h6>Keuangan Perbulan</h6>
                                </div>
                                    {{-- akta pendirian --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan Income:</label>
                                            <input type="text" id="income" class="form-control @error('income') is-invalid @enderror" name="income" placeholder="Masukkan nominal income" aria-label="Masukkan income" autofocus>
                                            @error('income')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- nib --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tambahkan Outcome:</label>
                                            <input type="text" id="outcome" class="form-control @error('outcome') is-invalid @enderror" name="outcome" placeholder="Masukkan nominal outcome" aria-label="Masukkan outcome" autofocus>
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