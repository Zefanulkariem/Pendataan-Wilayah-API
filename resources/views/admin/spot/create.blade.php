@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                        <h6 class="mb-3">Masukkan Lokasi Umkm</h6>
                    </div>
                    <div class="card-body p-3">
                        <div id="map" class="rounded" style="box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.15);"></div>
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
                        <form action="{{ route('Adminspot.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama
                                        Pemilik:</label>
                                    <select class="js-example-basic-single form-control" name="id_user">
                                        <option value="pilih pemilik umkm">- Pilih pemilik umkm -</option>
                                        @foreach ($idUser as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama
                                    Umkm:</label>
                                <input type="text"
                                    class="form-control @error('nama_umkm')
                            is-invalid
                            @enderror"
                                    name="nama_umkm" id="nama_umkm">
                                @error('nama_umkm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Titik
                                    Koordinat:</label>
                                <input type="text"
                                    class="form-control @error('koordinat')
                            is-invalid
                            @enderror"
                                    name="koordinat" id="koordinat">
                                @error('koordinat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Deskripsi
                                    Perusahaan:</label>
                                <textarea name="deskripsi" class="text-dark form-control summernote @error('deskripsi') is-invalid @enderror"
                                    rows="7"></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Logo
                                    Perusahaan:</label>
                                <div class="input-group col-xs-12 d-flex align-items-center">
                                    <input type="file" name="image" class="form-control file-upload-info"
                                        placeholder="Upload Gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">URL/Blog
                                    Perusahaan:</label>
                                <input name="link"
                                    class="text-dark form-control summernote @error('link') is-invalid @enderror"
                                    rows="7"></input>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih
                                    Lokasi Umkm:</label>
                                <select class="js-example-basic-single form-control" name="id_desa">
                                    <option value="pilih pemilik umkm">- Pilih lokasi -</option>
                                    @foreach ($desa as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_desa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih
                                    Kategori:</label>
                                <select class="js-example-basic-single form-control" name="id_jenis_umkm">
                                    <option value="pilih pemilik umkm">- Pilih kategori umkm -</option>
                                    @foreach ($jk as $data)
                                        <option value="{{ $data->id }}">{{ $data->jenis_umkm }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('Adminspot.index') }}" class="btn btn-danger">
                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
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
    
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        const map = L.map('map').setView([-7.022375700121086, 107.53072288278673], 4);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: 10,
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-7.022375700121086, 107.53072288278673], {
                draggable: true
            })
            .bindPopup('Tampilan Lokasi')
            .addTo(map);

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

        marker.on('dragend', function() {
            var koordinat = marker.getLatLng();
            marker.setLatLng(koordinat, {
                draggable: true
            })
            $('#koordinat').val(koordinat.lat + "," + koordinat.lng).keyup()
            $('#latitude').val(koordinat.lat).keyup()
            $('#longitude').val(koordinat.lng).keyup()
        })
    </script>
@endpush
