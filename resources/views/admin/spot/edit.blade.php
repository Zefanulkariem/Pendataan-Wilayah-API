@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 500px;
            width: auto;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="container">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Masukkan Lokasi Umkm</h6>
                </div>
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="container">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Titik Koordinat Umkm</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('Adminspot.update', $lokasiUmkm->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Pemilik:</label>
                                <select class="form-control" name="id_user">
                                    @foreach($idUser as $data)
                                        <option value="{{ $data->id }}" {{ $lokasiUmkm->id_user == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Umkm:</label>
                            <input type="text" class="form-control @error('nama_umkm')
                            is-invalid
                            @enderror" name="nama_umkm" id="nama_umkm" value="{{ old('nama_umkm', $lokasiUmkm->nama_umkm)}}">
                            @error('nama_umkm')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Titik Koordinat:</label>
                            <input type="text" class="form-control @error('koordinat')
                            is-invalid
                            @enderror" name="koordinat" id="koordinat" value="{{ old('koordinat', $lokasiUmkm->koordinat)}}">
                            @error('koordinat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Deskripsi Perusahaan:</label>
                            <textarea name="deskripsi" class="text-dark form-control summernote @error('deskripsi') is-invalid @enderror" rows="7"></textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Wajib di isi kembali.</small>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Logo Perusahaan:</label>
                            <div class="input-group col-xs-12 d-flex align-items-center">
                                <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Gambar">
                            </div>
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih Desa:</label>
                            <select class="form-control" name="id_desa">
                                @foreach($desa as $data){{--untuk memfilter desa--}}
                                <option value="{{ $data->id }}" {{ $lokasiUmkm->id_desa == $data->id ? 'selected' : '' }}>{{$data->nama_desa}}</option> {{--dropdown--}}
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <a href="{{route('Adminspot.index')}}" class="btn btn-danger">
                                <i class="fa fa-sharp fa-light fa-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>

        // buat peta
        const peta = L.map('map').setView([-7.022375700121086,107.53072288278673], 4);

        // buat nampilin layer osm
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 10,
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(peta);

        //bikin penanda
        const penanda = L.marker([-7.022375700121086,107.53072288278673],{ draggable:true })
        .addTo(peta);

        // ini buat ngambil koor
        function onMapClick(e) {
            const koordinat  = e.latlng;
            penanda.setLatLng(koordinat);
            document.querySelector("[name=koordinat]").value = `${koordinat.lat},${koordinat.lng}`;
        }
        peta.on('click',onMapClick);

        // ini untuk perbarui koornya
        penanda.on('dragend', function() {
            const koordinatBaru = penanda.getLatLng();
            document.querySelector("[name=koordinat]").value = `${koordinat.lat},${koordinat.lng}`;
        });
        
    </script>
    
@endpush
