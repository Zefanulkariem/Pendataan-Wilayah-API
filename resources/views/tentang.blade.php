<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - PWKB</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">PWKB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    <a class="nav-link active" href="{{ url('/about') }}">Tentang</a>
                    <a class="nav-link" href="{{ url('/contact') }}">Kontak Kami</a>
                    <a class="nav-link">|</a>
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </div>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero">
    <div class="text-center" data-aos="fade-up">
        <h1>Tentang Kami</h1>
        <p class="lead">PWKB hadir sebagai solusi untuk mendukung pertumbuhan UMKM di Kabupaten Bandung.</p>
    </div>
</header>

<!-- Tentang Kami Content -->
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2>Misi Kami</h2>
                <p>Kami berkomitmen menghubungkan UMKM lokal dengan pasar yang lebih luas melalui data terstruktur, peta interaktif, dan sistem monitoring perkembangan usaha.</p>
                <h2>Visi Kami</h2>
                <p>Menjadi platform digital terpercaya dalam pengembangan potensi ekonomi Kabupaten Bandung berbasis data dan kolaborasi.</p>
                <a href="{{ url('/contactus') }}" class="btn btn-primary mt-3">Hubungi Kami</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('welcome/slide1.jpeg') }}" class="img-fluid rounded shadow" alt="PWKB Map">
            </div>
        </div>
    </div>
</section>

<!-- Kenapa PWKB -->
<section class="section">
    <div class="container text-center">
        <h2>Kenapa Memilih PWKB?</h2>
        <p>✔️ Data UMKM selalu update<br>✔️ Peta interaktif wilayah Bandung<br>✔️ Platform terpercaya untuk investor dan pelaku usaha</p>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-nav">
        <div class="row">
            <div class="footer-col">
                <ul>
                    <h4><span>Pendataan Wilayah</span> Kabupaten Bandung</h4>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <h4>TENTANG PWKB</h4>
                    <li><a href="{{url('/about')}}">Tentang Kami</a></li>
                    <li><a href="{{url('/contact')}}">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <ul class="sosmed">
                    <h4>IKUTI KAMI DI MEDIA SOSIAL</h4>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
