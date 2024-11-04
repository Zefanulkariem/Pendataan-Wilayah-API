<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umkm Maps</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('maps/assets/css/style.css')}}">
</head>
<body>
    <div id="map"></div>
    <div class="filter-container">
        <center><label for="village-filter">Kecamatan:</label></center>
        <select id="village-filter">
            <option value="all">Semua</option>
            <!-- Option villages will be populated dynamically -->
        </select>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Create map centered at a specific location with restricted zoom and bounds
        const map = L.map('map', {
            center: [-6.9175, 107.6191], // Bandung coordinates
            zoom: 13,                    // Initial zoom level
            minZoom: 10                   // Minimum zoom level to prevent zooming out too far
        });

        // Set bounds to limit map movement to Bandung area
        const bounds = L.latLngBounds(
            L.latLng(-7.1, 107.4),        // Southwest bound
            L.latLng(-6.7, 107.9)         // Northeast bound
        );
        map.setMaxBounds(bounds);

        // Disable map from moving out of bounds
        map.on('drag', function() {
            map.panInsideBounds(bounds, { animate: false });
        });

        // Load OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Array of village names associated with colors
        const villages = [
            { name: 'Arjasari', color: 'red' },
            { name: 'Baleendah', color: 'blue' },
            { name: 'Banjaran', color: 'green' },
            { name: 'Bojongsoang', color: 'yellow' },
            { name: 'Cangkuang', color: 'orange' },
            { name: 'Cicalengka', color: 'purple' },
            { name: 'Cikancung', color: 'pink' },
            { name: 'Cilengkrang', color: 'brown' },
            { name: 'Cileunyi', color: 'black' },
            { name: 'Cimaung', color: 'white' },
            { name: 'Cimenyan', color: 'cyan' },
            { name: 'Ciparay', color: 'lime' },
            { name: 'Ciwidey', color: 'teal' },
            { name: 'Dayeuhkolot', color: 'violet' },
            { name: 'Ibun', color: 'indigo' },
            { name: 'Katapang', color: 'maroon' },
            { name: 'Kertasari', color: 'navy' },
            { name: 'Kutawaringin', color: 'grey' },
            { name: 'Majalaya', color: 'lightgreen' },
            { name: 'Margaasih', color: 'lightblue' },
            { name: 'Margahayu', color: 'salmon' },
            { name: 'Nagreg', color: 'gold' },
            { name: 'Pacet', color: 'coral' },
            { name: 'Pameungpeuk', color: 'beige' },
            { name: 'Pangalengan', color: 'khaki' },
            { name: 'Paseh', color: 'magenta' },
            { name: 'Pasirjambu', color: 'crimson' },
            { name: 'Rancabali', color: 'chartreuse' },
            { name: 'Rancaekek', color: 'olive' },
            { name: 'Solokanjeruk', color: 'tan' },
            { name: 'Soreang', color: 'darkgreen' }
        ];

        // Array of pin point locations with additional data
        const locations = [
            { lat: -6.9175, lon: 107.6191, village: 'Soreang', img: 'https://via.placeholder.com/120', nama: 'John Doe', kelamin: 'Male', namaUMKM: 'Bakery', jenisUMKM: 'Food' },
            { lat: -6.9200, lon: 107.6200, village: 'Baleendah', img: 'https://via.placeholder.com/120', nama: 'Jane Doe', kelamin: 'Female', namaUMKM: 'Handicrafts', jenisUMKM: 'Art' },
            // Add more locations
        ];

        // Store the created markers to allow filtering
        let markers = [];

        // Function to create marker
        function createMarker(lat, lon, color, title, img, nama, kelamin, namaUMKM, jenisUMKM) {
            const marker = L.circleMarker([lat, lon], {
                radius: 10,
                fillColor: color,
                color: color,
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            // Popup content with vertical alignment, closeButton set to false
            const popupContent = `
                <div class="popup-content">
                    <h3>${title}</h3>
                    <img src="${img}" alt="${title}" />
                    <div class="info">
                        <div><strong>Nama:</strong> ${nama}</div>
                        <div><strong>Kelamin:</strong> ${kelamin}</div>
                        <div><strong>Nama UMKM:</strong> ${namaUMKM}</div>
                        <div><strong>Jenis UMKM:</strong> ${jenisUMKM}</div>
                    </div>
                    <a href="https://www.google.com/maps?q=${lat},${lon}" target="_blank">Open in Google Maps</a><br/>
                    <button onclick="alert('More Info about ${title}')">Selengkapnya</button>
                </div>
            `;

            marker.bindPopup(popupContent, { closeButton: false });

            return marker;
        }

        // Create markers
        locations.forEach(loc => {
            const village = villages.find(v => v.name === loc.village);
            if (village) {
                const marker = createMarker(loc.lat, loc.lon, village.color, loc.village, loc.img, loc.nama, loc.kelamin, loc.namaUMKM, loc.jenisUMKM);
                markers.push({ marker, village: loc.village });
            }
        });

        // Populate filter options
        const villageFilter = document.getElementById('village-filter');
        villages.forEach(village => {
            const option = document.createElement('option');
            option.value = village.name;
            option.textContent = village.name;
            villageFilter.appendChild(option);
        });

        // Function to filter markers by village
        function filterMarkers(village) {
            markers.forEach(item => {
                if (village === 'all' || item.village === village) {
                    map.addLayer(item.marker);
                } else {
                    map.removeLayer(item.marker);
                }
            });
        }

        // Event listener for filter dropdown
        villageFilter.addEventListener('change', (e) => {
            filterMarkers(e.target.value);
        });
    </script>
</body>
</html>
