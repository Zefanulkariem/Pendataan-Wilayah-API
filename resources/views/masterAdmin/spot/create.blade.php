@extends('layouts.masterAdmin')

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
                    <form action="{{ route('Master Adminspot.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Pemilik:</label>
                            <input type="text" class="form-control @error('nama_pemilik')
                            is-invalid
                            @enderror" name="nama_pemilik" id="nama_pemilik">
                            @error('nama_pemilik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Umkm:</label>
                            <input type="text" class="form-control @error('nama_umkm')
                            is-invalid
                            @enderror" name="nama_umkm" id="nama_umkm">
                            @error('nama_umkm')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Koordinat:</label>
                            <input type="text" class="form-control @error('koordinat')
                            is-invalid
                            @enderror" value="-7.022375700121086,107.53072288278673" name="koordinat" id="koordinat">
                            @error('koordinat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Perusahaan:</label>
                            <input type="text" class="form-control @error('deskripsi')
                            is-invalid
                            @enderror" name="deskripsi" id="deskripsi">
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Gambar Produk</label>
                            <div class="input-group col-xs-12 d-flex align-items-center">
                                <input type="file" name="cover" class="form-control file-upload-info" placeholder="Upload Gambar Prod">
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="{{route('Master Adminspot.index')}}" class="btn btn-danger">
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
        const map = L.map('map').setView([-7.022375700121086,107.53072288278673], 4);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 10,
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-7.022375700121086,107.53072288278673],{
            draggable:true
        })
        .bindPopup('Tampilan Lokasi')
        .addTo(map);

        function onMapClick(e) {
            var coords  = document.querySelector("[name=koordinat]")
            var latitude  = document.querySelector("[name=latitude]")
            var longitude  = document.querySelector("[name=longitude]")
            var lat = e.latlng.lat
            var lng = e.latlng.lng

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map)
            } else {
                marker.setLatLng(e.latlng)
            }

            coords.value = lat + "," + lng
            latitude.value = lat,
            longitude.value = lng
        }
        map.on('click',onMapClick)

        marker.on('dragend',function(){
            var koordinat = marker.getLatLng();
            marker.setLatLng(koordinat,{
                draggable:true
            })
            $('#koordinat').val(koordinat.lat + "," + koordinat.lng).keyup()
            $('#latitude').val(koordinat.lat).keyup()
            $('#longitude').val(koordinat.lng).keyup()
        })
    </script>
@endpush
