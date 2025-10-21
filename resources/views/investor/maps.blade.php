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
    <a href="{{ route('Investorhome') }}" class="tombol-kembali text"><i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali</a>
    <div class="filter-container">
        <label for="kecamatan-filter" style="align-items: center">Kecamatan:</label>
        <select id="kecamatan-filter">
            <option value="all">Semua</option>
        </select>
    </div>
    <div id="sidebar-keuangan">
        <button id="close-sidebar">✖</button>
        <h2>Keuangan UMKM</h2>
        <div id="keuangan-detail">Pilih UMKM untuk melihat detail keuangan...</div>
    </div>
    
    {{-- <pre>{{ print_r($lokasis->toArray(), true) }}</pre> --}}
    
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    const lokasis = @json($lokasis);

    const batasPeta = L.latLngBounds(
        L.latLng(-6.796101, 107.257445),
        L.latLng(-7.402902, 107.833103)
    );

    const map = L.map('map', {
        center: [-6.9175, 107.6191],
        zoom: 13,
        minZoom: 10,
        maxBounds: batasPeta,
        maxBoundsViscosity: 1.0 
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const kecamatans = [
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

    let markers = [];

    function createMarker(lat, lon, color, title, desa, img, nama, kelamin, namaUMKM, link, jenisUMKM, deskripsi, keuangan) {
        const marker = L.circleMarker([lat, lon], {
            radius: 10,
            fillColor: color,
            color: color,
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        }).addTo(map);
        
        //  ECMAScript Internationalization API
        const tanggal = (tanggal)=>{
            return new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(new Date(tanggal)); //convert string jadi objek
        };
        const rupiah = (angka)=>{
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(angka);
        };

        //ubah data array ke item
        let keuanganText = (keuangan && keuangan.length > 0) ?
        keuangan.map(k => `
        <h3>${tanggal(k.tanggal)}</h3>
        <b>Pemasukkan:</b> ${rupiah(k.income)} <br>
        <b>Pengeluaran:</b> ${rupiah(k.outcome)} <br>
        <b>Untung/Rugi:</b> ${rupiah(k.profit_loss)} <br>
        <hr>
        `).join('')
        : "Data keuangan tidak tersedia";

        const popupUmkm = `
            <div class="popup-content">
                <h3>${title}</h3>
                <img src="${img}" alt="${nama}"/>
                <div class="info">
                    <div><h2 style="text-align: center;">${nama ?? 'Data tidak tersedia'}</h2></div>
                    <div><strong>Nama UMKM:</strong> ${namaUMKM ?? 'Data tidak tersedia'}</div>
                    <div><strong>Desa:</strong> ${desa ?? 'Data tidak tersedia'}</div>
                    <div><strong>Kecamatan:</strong> ${title ?? 'Data tidak tersedia'}</div>
                    <div><strong>Kategori UMKM:</strong> ${jenisUMKM ?? 'Data tidak tersedia'}</div>
                    <div><strong>Deskripsi:</strong> ${deskripsi ?? 'Data tidak tersedia'}</div>
                </div>
                <a href="https://www.google.com/maps?q=${lat},${lon}" target="_blank">Buka di Google Maps</a><br/>
                <a href="${link}" target="_blank">Selengkapnya <i class="fa fa-sharp fa-light fa-arrow-right"></i></a>
            </div>
        `;

        marker.bindPopup(popupUmkm, {
            closeButton: false
        });

        // sidebar
        let sidebar = document.getElementById('sidebar-keuangan');
        let detail = document.getElementById('keuangan-detail');
        let tutupSidebar = document.getElementById('close-sidebar');

        marker.on("click", function () {
            console.log("marker ke klik cuy");
            sidebar.classList.add("show"); // classList itu kelola css
            detail.innerHTML = `<h3>${nama}</h3><hr><p>${keuanganText}</p>`;
        });

        // hapus show css
        tutupSidebar.addEventListener("click", function () {
            sidebar.classList.remove("show"); 
        });

        return marker;
    }

    // marker
    lokasis.forEach(loc => {
        const kecamatan = kecamatans.find(k => k.name === loc.kecamatan);
        if (kecamatan) {
            const marker = createMarker(
                loc.lat, loc.lon, kecamatan.color, loc.kecamatan, loc.desa,
                loc.img, loc.nama, loc.kelamin, loc.namaUMKM, loc.link, loc.jenisUMKM,
                loc.deskripsi, loc.keuangan,
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
