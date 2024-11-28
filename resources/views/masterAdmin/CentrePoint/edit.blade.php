@extends('layouts.masterAdmin')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="container">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6>Masukkan Lokasi</h6>
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
                        <h6>Titik Koordinat</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Master Admincentre-point.update', $centrePoint->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Koordinat</label>
                                <input type="text" value="{{ $centrePoint->koordinat }}"
                                    class="form-control @error('koordinat') is-invalid
                                @enderror"
                                    name="koordinat" id="koordinat">
                                @error('koordinat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a href="{{ route('Master Admincentre-point.index') }}" class="btn btn-danger">
                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i>
                                </a>
                                <button type="submit" class="btn btn-primary">Update</button>
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
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 10,
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var map = L.map('map', {
            center: [-7.022375700121086, 107.53072288278673],
            zoom: 5,
            layers: [osm]
        })


        var marker = L.marker([{{ $centrePoint->koordinat }}], {
            draggable: true
        }).addTo(map);



        function onMapClick(e) {
            var coords = document.querySelector("[name=koordinat]")
            var latitude = document.querySelector("[name=latitude]")
            var longitude = document.querySelector("[name=longitude]")
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
        map.on('click', onMapClick)
        // CARA PERTAMA

        // CARA KEDUA
        marker.on('dragend', function() {
            var koordinat = marker.getLatLng();
            marker.setLatLng(koordinat, {
                draggable: true
            })
            $('#koordinat').val(koordinat.lat + "," + koordinat.lng).keyup()
            $('#latitude').val(koordinat.lat).keyup()
            $('#longitude').val(koordinat.lng).keyup()
        })
        // CARA KEDUA
    </script>
@endpush
