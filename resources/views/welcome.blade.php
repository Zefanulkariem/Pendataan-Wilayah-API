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
    <title>Pendataan Web Kabupaten Bandung - PWKB</title>
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
                    @if(Auth::user()->hasRole('Master Admin'))
                        <a class="nav-link" href="{{ url('/dashboard') }}">{{ __('Dasbor') }}</a>
                    @elseif (Auth::user()->hasRole('Admin'))
                        <a class="nav-link" href="{{ url('/dashboard-admin') }}">{{ __('Dasbor') }}</a>
                    @elseif (Auth::user()->hasRole('Umkm'))
                        <a class="nav-link" href="{{ url('/umkm') }}">{{ __('Dasbor') }}</a>
                    @elseif (Auth::user()->hasRole('Investor'))
                        <a class="nav-link" href="{{ url('/investor') }}">{{ __('Dasbor') }}</a>
                    @endif
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
            <div class="col" style="margin-top: 40vh; margin-left: 50px;">
                <p style="margin-right: 1rem; line-height: 1.2;"><span>Selamat datang</span> di<br>Pendataan Wilayah Kab. Bandung</p>
                <p class="col-md-3 p2" style="line-height: 1.2;">Sistem pendataan dengan map interaktif Tekan untuk melihat selengkapnya</p>
                <a href="#selengkapnya" type="button" class="btn">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!-- Container2 -->
    <div class="container-fluid konten2 bg-light text-center text-dark"
        style="background-image: url('https://i.ibb.co.com/CVScp00/Frame-3-1-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row align-items-start">
            <div class="col">
                <div class="custom-text-container">
                    <span class="hover-line"></span>
                    <p>Jembatan bagi UMKM dan Investor<br> untuk Ekonomi Lebih Kuat</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container3 -->
    <div class="container-fluid text-center bg-black text-light" id="selengkapnya"
        style="height: 70vh; background-image: url('https://i.ibb.co.com/2y6rtvB/Frame-5-1-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row align-items-center h-100">
            <div class="col text-start" style="max-width: 300px; margin: 0 auto; padding-top: 50px;">
                <h3 style="color: #6fe056; font-weight: 400; font-size: 20px; margin-bottom: 10px;">0.1</h3>
                <h4 style="font-weight: 500; margin-bottom: 20px;">Penggunaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengguna dapat melakukan pencarian dan informasi data UMKM dengan menggunakan maps interaktif,
                    pengguna internal dapat memantau perkembangan usaha anda melalui dashboard.
                </p>
            </div>
            <div class="col text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #6fe056; font-weight: 400; font-size: 20px; margin-bottom: 10px;">0.2</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengelolaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengelolaan dilakukan dengan aman dan terstruktur, memastikan informasi legalitas dan
                    pendanaan selalu data asli.
                </p>
            </div>
            <div class="col text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #6fe056; font-weight: 400; font-size: 20px;margin-bottom: 10px;">0.3</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengembangan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Kami terus mengembangkan fitur-fitur baru untuk mendukung UMKM dalam berekspansi, termasuk ke pasar
                    nasional.
                </p>
            </div>
        </div>
    </div>
    <!-- Container4 -->
    <div class="container-fluid text-center bg-black text-light"
        style="height: 70vh; background-image: url('https://i.ibb.co.com/qn1pCh6/Frame-6-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row h-100 align-items-center">

            {{-- carousel --}}
            <div class="col-md-6 pe-5">
                <div id="carouselContainer5" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden; max-width: 90%; margin: auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>

                    <!-- Isi Carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('welcome/umkm1.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm2.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm3.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm4.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm5.png')}}" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <p class="text-image">Gambar 1.0 Dasbor UMKM</p>
            </div>

            <div class="col-md-6 text-start pe-5">
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #6fe056;">1.0</span> Fitur Dasbor UMKM</h5>
                <p style="font-size: 0.9rem;">Ini adalah beberapa fitur dari web ini</p>
                <br>
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #6fe056;">2.0</span> Penjelasan Fitur Web</h5>
                <p style="font-size: 0.9rem; line-height: normal; text-align: left;">Pengguna dapat menginput pendataan
                    komoditi UMKM di daerah Kabupaten Bandung. Maps interaktif sebagai alat utama untuk menyajikan informasi pendataan UMKM. Melalui peta ini, pihak terkait juga dilengkapi dengan informasi detail
                    mengenai jenis usaha, profil UMKM, dan lokasi UMKM</p>
            </div>
        </div>
    </div>
    <!-- Container5 -->
    <div class="container-fluid text-center bg-black text-light"
        style="height: 110vh; background-image: url('https://i.ibb.co.com/THMjKqz/Frame-2-2-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row h-100 align-items-center">
            <!-- Bagian teks di kiri -->
            <div class="col-md-6 text-start ps-5">
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #6fe056;">1.0</span> Fitur Dasbor Investor
                </h5>
                <p style="font-size: 0.9rem;">Berikut adalah beberapa fitur dari web ini</p>
                <br>
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #6fe056;">2.0</span> Penjelasan mengenai Fitur Web ini
                </h5>
                <p style="font-size: 0.9rem; line-height: normal;">
                    Pengguna dapat mencari informasi lokasi UMKM di wilayah Kabupaten Bandung dengan menggunakan maps interaktif yang menyajikan informasi seperti profil usaha, profil UMKM, dan jenis usaha.
                </p>
            </div>

            <!-- Carousel di kanan -->
            <div class="col-md-6 pe-5">
                <div id="carouselContainer5" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden; max-width: 90%; margin: auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <!-- Isi Carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('welcome/slide1.jpeg')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/slide2.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('welcome/slide3.png')}}" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <!-- Kontrol Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselContainer5"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselContainer5"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
                <p class="text-image">Gambar 2.0 Dasbor Investor</p>
            </div>
        </div>
    </div>
    <!-- Container6 -->
    <div class="container-fluid text-absolute text-dark" id="tentang-kami">
        <div class="row align-items-start">
            <div class="col" style="margin-top: 20vh; margin-left: 50px;">
                <h2 style="line-height: 1.2;">Tentang Kami</h2>
                <p class="p2" style="line-height: 1.2;">Aplikasi PKWB adalah solusi digital yang dirancang untuk mempertemukan UMKM dengan Investor atau pihak terkait melalui platform berbasis maps interaktif.</p>
                <a href="{{ url('/about') }}" type="button" class="btn">Selengkapnya</a>
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
                        <li><a href="{{url('/contactus')}}">Kontak Kami</a></li>
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
