<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map - Kecamatan dan Desa di Kabupaten Bandung</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- style --}}
    <link rel="stylesheet" href="{{asset('maps/assets/css/style.css')}}">
   
</head>
<body>
    
    <button onclick="refreshMap()">Refresh Peta</button>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        var map;

        // Fungsi untuk menginisialisasi peta
        function initMap() {
            map = L.map('map').setView([-6.934467, 107.605371], 11);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 20,
                minZoom: 10
            }).addTo(map);

            var southWest = L.latLng(-7.200, 107.400); // Koordinat Barat Daya
            var northEast = L.latLng(-6.600, 107.900); // Koordinat Timur Laut
            var bounds = L.latLngBounds(southWest, northEast);

            map.setMaxBounds(bounds);
            map.on('drag', function() {
                map.panInsideBounds(bounds, { animate: false });
            });

            var kecamatan = [
                { name: "Kecamatan 1", coords: [-7.005145, 107.668976] },
                { name: "Kecamatan 2", coords: [-6.979137, 107.561237] },
            ];

            var desaByKecamatan = {
                "Kecamatan 1": [
                    { name: "Desa A1", coords: [-7.010000, 107.670000], img: 'https://via.placeholder.com/100' },
                    { name: "Desa B1", coords: [-7.015000, 107.680000], img: 'https://via.placeholder.com/100' }
                ],
                "Kecamatan 2": [
                    { name: "Desa A2", coords: [-6.980000, 107.560000], img: 'https://via.placeholder.com/100' },
                    { name: "Desa B2", coords: [-6.985000, 107.570000], img: 'https://via.placeholder.com/100' }
                ]
            };

            // Tambahkan marker kecamatan dengan gambar dalam pop-up
            kecamatan.forEach(function(kec) {
                var marker = L.marker(kec.coords).addTo(map);

                // Event untuk menampilkan pop-up saat kursor diarahkan ke marker
                marker.on('mouseover', function() {
                    marker.bindPopup("<b>" + kec.name + "</b><br><img src='" + "'<br>Klik untuk melihat desa.").openPopup();
                });

                // Event untuk menutup pop-up saat kursor menjauh dari marker
                marker.on('mouseout', function() {
                    marker.closePopup();
                });

                marker.on('click', function() {
                    // Menghapus marker desa yang ada sebelumnya
                    map.eachLayer(function(layer) {
                        if (layer instanceof L.Marker && !kecamatan.includes(layer)) {
                            map.removeLayer(layer);
                        }
                    });

                    // Menampilkan marker desa terkait
                    desaByKecamatan[kec.name].forEach(function(desa) {
                        L.marker(desa.coords).addTo(map)
                            .bindPopup("<b>" + desa.name + "</b><br><img src='" + desa.img + "' width='100px'><br>Ini adalah desa di " + kec.name);
                    });
                });
            });

            // Nonaktifkan event klik peta di luar marker
            // map.on('click', function(e) {
            //     var popup = L.popup()
            //         .setLatLng(e.latlng)
            //         .setContent("Anda mengklik pada koordinat " + e.latlng.toString())
            //         .openOn(map);
            // });
        }

        // Inisialisasi peta ketika halaman dimuat
        initMap();

        // Fungsi untuk merefresh peta saja
        function refreshMap() {
            map.remove(); // Hapus peta yang ada
            document.getElementById('map').innerHTML = ""; // Kosongkan elemen peta
            initMap(); // Inisialisasi ulang peta
        }
    </script>
</body>
</html>
