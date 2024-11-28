<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Maps</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('maps/assets/css/maps.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <div id="map"></div>
    <a href="{{ route('Investorhome') }}" class="tombol-kembali text"><i class="fa fa-sharp fa-light fa-arrow-left"></i>
        Kembali</a>
    <a href="{{ route('Investormeeting.index') }}" class="tombol-meeting text">Jadwal Meeting <i
            class="fa fa-sharp fa-light fa-arrow-right"></i></a>
    <div class="filter-container">
        <center><label for="kecamatan-filter">Kecamatan:</label></center>
        <select id="kecamatan-filter">
            <option value="all">Semua</option>
        </select>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Mengirimkan data lokasi dari backend ke JavaScript -->
    <script>
        // Data lokasi dari controller diubah ke JSON agar bisa digunakan di JavaScript
        const lokasis = @json($lokasis);

        // Konfigurasi peta menggunakan Leaflet
        const map = L.map('map', {
            center: [-6.9175, 107.6191],
            zoom: 13,
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

        function createMarker(lat, lon, color, title, desa, img, nama, kelamin, namaUMKM, link, jenisUMKM, deskripsi) {
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
                    <h3>${title}</h3>
                    <img src="${img}" alt="${nama}"/>
                    <div class="info">
                        <div><strong>Nama:</strong> ${nama}</div>
                        <div><strong>Kelamin:</strong> ${kelamin}</div>
                        <div><strong>Nama UMKM:</strong> ${namaUMKM}</div>
                        <div><strong>Desa:</strong> ${desa}</div>
                        <div><strong>Kecamatan:</strong> ${title}</div>
                        <div><strong>Kategori UMKM:</strong> ${jenisUMKM}</div>
                        <div><strong>Deskripsi:</strong> ${deskripsi}</div>
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
                    loc.img, loc.nama, loc.kelamin, loc.namaUMKM, loc.link, loc.jenisUMKM, loc.deskripsi
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
</body>

</html>
