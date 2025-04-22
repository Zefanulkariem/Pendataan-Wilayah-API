<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Layanan - PWKB</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('welcome/css/style.css')}}">
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">PWKB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/contactus">Kontak Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Informasi Kontak -->
<section class="contact-info py-5" style="background-color: #2c5f2d; color: white;">
    <div class="container">
        <h2 class="mb-4">Hubungi Kami</h2>
        <p class="mb-4">Kami siap membantu Anda mendapatkan informasi lebih lanjut mengenai layanan kami.
            Silakan hubungi kontak di bawah ini:</p>
        <ul class="list-unstyled">
            <li class="mb-3"><i class="fa-solid fa-location-dot me-2"></i>Jl. Raya Soreang No.123, Kabupaten Bandung, Jawa Barat, 40911</li>
            <li class="mb-3"><i class="fa fa-phone me-2"></i>(+62) 812-3456-7890 / (+62) 812-3456-7890</li>
            <li class="mb-3"><i class="fa fa-envelope me-2"></i>info@pwkb-bandung.id</li>
            <li class="mb-3"><i class="fa-regular fa-clock me-2"></i>Senin - Jumat | 08.00 - 17.00 WIB</li>
        </ul>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
