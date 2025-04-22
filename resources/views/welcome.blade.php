<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PWKB - Pendataan Wilayah Kab. Bandung</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Custom CSS -->
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
          <a class="nav-link" href="{{ url('/about') }}">Tentang</a>
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
    <h1>Pendataan Wilayah Kab. Bandung</h1>
    <p class="lead">Sistem informasi untuk mendata potensi wilayah di Kabupaten Bandung</p>
  </div>
</header>

<!-- Tentang Section -->
<section class="section bg-light" id="tentang">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <h2>Tentang PWKB</h2>
        <p>Platform ini hadir untuk mempertemukan pelaku UMKM lokal dengan investor dalam rangka mendorong pertumbuhan ekonomi daerah. Melalui fitur Maps Interaktif, investor dapat dengan mudah menemukan lokasi dan profil usaha di seluruh wilayah Kabupaten Bandung.</p>
        <a href="#" class="btn btn-primary mt-3">Selengkapnya</a>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <img src="{{ asset('welcome/slide1.jpeg') }}" class="img-fluid rounded shadow" alt="Peta Kab. Bandung">
      </div>
    </div>
  </div>
</section>

<!-- UMKM Feature Section -->
<section class="umkm-section">
  <div class="container">
    <div class="title">
      <h1>PWKB</h1>
    </div>
    <div class="umkm-grid">
      <div class="umkm-card">
        <h2><span>0.1</span> Penggunaan</h2>
        <p>Investor, UMKM, dan pengguna umum dapat melakukan pencarian informasi data UMKM melalui maps interaktif. Investor dapat menggunakan data ini untuk riset dan potensi investasi, sementara UMKM bisa memantau perkembangan usahanya melalui dashboard khusus, termasuk melihat laporan keuangan dan laporan perkembangan usaha mereka.</p>
      </div>
      <div class="umkm-card">
        <h2><span>0.2</span> Pengelolaan</h2>
        <p>Pengelolaan data dilakukan secara aman dan terstruktur oleh tim admin. Admin bertugas memastikan bahwa data yang ditampilkan seperti legalitas usaha, status pendanaan, dan informasi profil UMKM selalu akurat, terpercaya.</p>
      </div>
      <div class="umkm-card">
        <h2><span>0.3</span> Pengembangan</h2>
        <p>PUBK terus mengembangkan berbagai fitur baru untuk mendukung UMKM dalam memperluas bisnisnya ke pasar lokal dan nasional, serta memudahkan investor dalam menemukan peluang usaha potensial. Platform ini juga menyediakan fasilitas bagi UMKM untuk mendaftarkan usaha, memperbarui data, dan memantau perkembangan usahanya secara mandiri.</p>
      </div>
    </div>
  </div>
</section>

{{-- footer --}}
<footer class="footer">
    <div class="footer-nav">
        <div class="row">
            <div class="footer-col">
                <ul>
                    <h4><span>Pendataan Wilayah</span> Kabupaten Bandung</h4>
                    <li>Mempermudah akses informasi UMKM dan wilayah di Kabupaten Bandung.</li>
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
                    <a href="https://wa.me/6281234567890" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/yourusername" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/yourusername" target="_blank"><i class="fab fa-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; 2025 PWKB - Semua Hak Dilindungi.
    </div>
</footer>



<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

</body>
</html>
