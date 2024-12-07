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
    <div class="row pb-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                                <h5 class="font-weight-bolder">
                                    {{ $jmlUser }} Pengguna
                                </h5>
                                {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+{{ number_format($persen) }}%</span>
                    sejak bulan lalu
                  </p> --}}
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Investor</p>
                                <h5 class="font-weight-bolder">
                                    {{ $jmlUserInvestor }} Investor
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pelaku Umkm</p>
                                <h5 class="font-weight-bolder">
                                    {{ $jmlUserUmkm }} Pelaku
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Lokasi Umkm Terdaftar</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($jmlUmkm) }} Terdaftar
                                </h5>
                                {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                  </p> --}}
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Lokasi Umkm Kab. Bandung</h6>
                </div>
                <hr class="horizontal dark">
                <div class="card-body p-3 pt-0">
                    <div class="filter-container">
                        <label for="kecamatan-filter">Kecamatan:</label>
                        <div class="col-4 pb-3">
                            <select class="form-control" id="kecamatan-filter">
                                <option value="all">Semua</option>
                            </select>
                        </div>
                        <div id="map" class="rounded" style="box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.15);"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0" style="float: left">Kategori Umkm</h6>
                    <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" style="float: right"
                        href="{{ route('Adminspot.index') }}"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group px-3">
                        @foreach ($jenisUmkm as $data)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{ $data->jenis_umkm }}</h6>
                                        <span class="text-xs">{{ $data->lokasi__umkm_count ?? '0' }} <span
                                                class="font-weight-bold">Umkm</span></span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Data lokasi dari controller diubah ke JSON agar bisa digunakan di JavaScript
        const lokasis = @json($lokasis);

        // Konfigurasi peta menggunakan Leaflet
        const map = L.map('map', {
            center: [-6.9810689, 107.5666283],
            zoom: 11,
            minZoom: 10
        });

        const bounds = L.latLngBounds();
        map.setMaxBounds(bounds);
        map.on('drag', function() {
            map.panInsideBounds(bounds, {
                animate: false
            });
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const kecamatans = [{
                name: 'Arjasari',
                color: 'red'
            },
            {
                name: 'Baleendah',
                color: 'blue'
            },
            {
                name: 'Banjaran',
                color: 'green'
            },
            {
                name: 'Bojongsoang',
                color: 'yellow'
            },
            {
                name: 'Cangkuang',
                color: 'orange'
            },
            {
                name: 'Cicalengka',
                color: 'purple'
            },
            {
                name: 'Cikancung',
                color: 'pink'
            },
            {
                name: 'Cilengkrang',
                color: 'brown'
            },
            {
                name: 'Cileunyi',
                color: 'black'
            },
            {
                name: 'Cimaung',
                color: 'white'
            },
            {
                name: 'Cimenyan',
                color: 'cyan'
            },
            {
                name: 'Ciparay',
                color: 'lime'
            },
            {
                name: 'Ciwidey',
                color: 'teal'
            },
            {
                name: 'Dayeuhkolot',
                color: 'violet'
            },
            {
                name: 'Ibun',
                color: 'indigo'
            },
            {
                name: 'Katapang',
                color: 'maroon'
            },
            {
                name: 'Kertasari',
                color: 'navy'
            },
            {
                name: 'Kutawaringin',
                color: 'grey'
            },
            {
                name: 'Majalaya',
                color: 'lightgreen'
            },
            {
                name: 'Margaasih',
                color: 'lightblue'
            },
            {
                name: 'Margahayu',
                color: 'salmon'
            },
            {
                name: 'Nagreg',
                color: 'gold'
            },
            {
                name: 'Pacet',
                color: 'coral'
            },
            {
                name: 'Pameungpeuk',
                color: 'beige'
            },
            {
                name: 'Pangalengan',
                color: 'khaki'
            },
            {
                name: 'Paseh',
                color: 'magenta'
            },
            {
                name: 'Pasirjambu',
                color: 'crimson'
            },
            {
                name: 'Rancabali',
                color: 'chartreuse'
            },
            {
                name: 'Rancaekek',
                color: 'olive'
            },
            {
                name: 'Solokanjeruk',
                color: 'tan'
            },
            {
                name: 'Soreang',
                color: 'darkgreen'
            }
        ];

        let markers = [];

        function createMarker(lat, lon, color, title, desa, img, nama, kelamin, namaUMKM, link, jenisUMKM) {
            const marker = L.circleMarker([lat, lon], {
                radius: 10,
                fillColor: color,
                color: color,
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            const popupContent = `
            <div class="popup-content">
                <img src="${img}" alt="${nama}" style="width: 200px;"/>
                <div class="info">
                    <div><strong>Nama:</strong> ${nama}</div>
                    <div><strong>Kelamin:</strong> ${kelamin}</div>
                    <div><strong>Nama UMKM:</strong> ${namaUMKM}</div>
                    <div><strong>Desa:</strong> ${desa}</div>
                    <div><strong>Kecamatan:</strong> ${title}</div>
                    <div><strong>Kategori UMKM:</strong> ${jenisUMKM}</div>
                </div>
                <a href="https://www.google.com/maps?q=${lat},${lon}" target="_blank">Buka di Google Maps</a><br/>
                <a href="${link}" target="_blank">Selengkapnya</a>
            </div>
        `;

            marker.bindPopup(popupContent, {
                closeButton: false
            });

            return marker;
        }

        lokasis.forEach(loc => {
            console.log(loc);
            const kecamatan = kecamatans.find(k => k.name === loc.kecamatan);
            if (kecamatan) {
                const marker = createMarker(
                    loc.lat, loc.lon, kecamatan.color, loc.kecamatan, loc.desa,
                    loc.img, loc.nama, loc.kelamin, loc.namaUMKM, loc.link, loc.jenisUMKM
                );
                markers.push({
                    marker,
                    kecamatan: loc.kecamatan
                });
            }
        });

        const kecamatanFilter = document.getElementById('kecamatan-filter');
        kecamatans.forEach(kecamatan => {
            const option = document.createElement('option');
            option.value = kecamatan.name;
            option.textContent = kecamatan.name;
            kecamatanFilter.appendChild(option);
        });

        function filterMarkers(kecamatan) {
            markers.forEach(item => {
                if (kecamatan === 'all' || item.kecamatan === kecamatan) {
                    map.addLayer(item.marker);
                } else {
                    map.removeLayer(item.marker);
                }
            });
        }

        kecamatanFilter.addEventListener('change', (e) => {
            filterMarkers(e.target.value);
        });
    </script>
@endpush
