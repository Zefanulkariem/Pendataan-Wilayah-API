<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Informasi Layanan</title>
    <link rel="stylesheet" href="{{asset('welcome/css/style.css')}}">
</head>

<body>
    <!-- Navbar -->
    @guest
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    <a class="nav-link" href="{{ url('/about') }}">Tentang</a>
                    <a class="nav-link" href="{{ url('/contactus') }}">Kontak Kami</a>
                    <a class="nav-link">|</a>
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </div>
            </div>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    <a class="nav-link" href="{{ url('/about') }}">Tentang</a>
                    <a class="nav-link" href="{{ url('/contactus') }}">Kontak Kami</a>
                    <a class="nav-link">|</a>
                    <a class="nav-link">{{Auth::user()->name}}</a>
                </div>
            </div>
        </div>
    </nav>
    @endguest
    <!-- Container 1 -->
    <div class="header">
        <div class="container-fluid">
            <a href="tel:#"><i class="fa fa-phone"></i> (+62) 812-3456-7890</a>
            <a href="mailto:#"><i class="fa fa-envelope"></i> info@pwkb-bandung.id</a>
        </div>
    </div>
    <div class="container-fluid text-absolute bg-light text-dark header-1">
        <div class="row align-items-start">
            <div class="col" style="margin-top: 20vh; margin-left: 50px">
                <p style="margin-right: 1rem; line-height: 1.2;"><span>Hubungi Kami</span></p>
                <p class="col-md-6 p2" style="line-height: 1.2;">Kami siap membantu Anda mendapatkan informasi lebih lanjut mengenai layanan kami. Jangan ragu untuk menghubungi kami melalui kontak di bawah ini:</p>
            </div>
            <div class="col-md-10" style="margin-top: 1%; margin-left: 50px; color: gray;">
                <p class="p2"><i class="fa-solid fa-location-dot" style="margin-right: 1%"></i>Alamat Kantor :</p>
                <p class="p2" style="line-height: 0; color: #000;">Jl. Raya Soreang No.123, Kabupaten Bandung, Jawa Barat, 40911</p>
            </div>
            <div class="col-md-10" style="margin-top: 1%; margin-left: 50px; color: gray;">
                <p class="p2"><i class="fa fa-phone" style="margin-right: 1%"></i>Telepon :</p>
                <p class="p2" style="line-height: 0; color: #000;">(+62) 812-3456-7890 / (+62) 812-3456-7890</p>
            </div>
            <div class="col-md-10" style="margin-top: 1%; margin-left: 50px; color: gray;">
                <p class="p2"><i class="fa fa-envelope" style="margin-right: 1%"></i>Alamat Email :</p>
                <p class="p2" style="line-height: 0; color: #000;">info@pwkb-bandung.id</p>
            </div>
            <div class="col-md-10" style="margin-top: 1%; margin-left: 50px; color: gray;">
                <p class="p2"><i class="fa-regular fa-clock" style="margin-right: 1%"></i>Jam Operasional :</p>
                <p class="p2" style="line-height: 0; color: #000;">Senin - Jumat | 08.00 - 17.00 WIB</p>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <footer class="footer">
        <div class="footer-nav" >
            <div class="row">
                <div class="footer-col">
                    <ul>
                        <h4><span>Pendataan Wilayah</span>  Kabupaten Bandung</h4>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <ul>
                        <h4>TENTANG PWKB</h4>
                        <li><a href="{{url('/about')}}">Tentang Kami</a></li>
                        <li><a href="">Kontak Kami</a></li>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>