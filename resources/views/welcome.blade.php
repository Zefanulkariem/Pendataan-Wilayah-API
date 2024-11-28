<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Pendataan Web Kabupaten Bandung - PWKB</title>
    <style>
        body {
            background-color: white;
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            z-index: 1030;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            padding: 4px;
            background: rgba(202, 202, 202, 0.349);
            backdrop-filter: blur(10px);
        }

        .container-fluid {
            padding-left: 40px;
            padding-right: 40px;
        }

        /* Add spacing between navbar items */
        .navbar-nav .nav-link {
            margin: 0 18px;
            color: black;
            font-weight: 400;
            font-size: 14px;
        }

        /* Hover effect on nav links */
        .navbar-nav .nav-link {
            transition: color 0.3s ease;
            color: black;
        }

        .navbar-nav .nav-link:hover {
            color: black;
        }

        .navbar-nav:hover .nav-link {
            color: rgba(0, 0, 0, 0.4);
        }

        .navbar-nav .nav-link:hover {
            color: black;
        }

        /* Smooth transition for navbar collapse in mobile view */
        @media (max-width: 991.98px) {
            .navbar-collapse.collapse {
                height: 0;
                overflow: hidden;
                transition: height 0.4s ease;
            }

            .navbar-collapse.collapsing {
                height: 0;
                overflow: hidden;
            }

            .navbar-collapse.show {
                height: auto;
            }
        }

        /* Kontainer 1*/
        p {
            font-size: 30px;
            line-height: 0.7;
            font-weight: 500;
        }

        .p2 {
            font-size: 15px;
            line-height: 2;
            font-weight: 500;
        }

        .p3 {
            font-size: 30px;
            line-height: 2;
            font-weight: 500;
        }

        /* Kontainer 2*/
        .custom-text-container {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            text-align: center;
            color: black;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 400;
            font-size: 16px;
        }

        /* Garis vertikal */
        .hover-line {
            display: inline-block;
            width: 3px;
            height: 50px;
            background-color: #00aaff;
            transition: transform 0.3s ease-in-out;
        }

        /* Efek hover */
        .custom-text-container:hover .hover-line {
            transform: translateX(-10px);
        }

        /* Teks */
        .custom-text-container p {
            margin: 0;
            font-size: 18px;
            line-height: 1.5;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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
                    <a class="nav-link" href="{{ url('/tutorial') }}">Tutorial</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Container 1 -->
    <div class="container-fluid text-absolute bg-light text-dark"
        style="height: 100vh; background-image: url('https://i.ibb.co.com/F0TgvmV/Frame-4-1-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row align-items-start">
            <div class="col" style="margin-top: 40vh; margin-left: 50px;">
                <p data-aos="fade-right" data-aos-delay="630">Selamat datang di website</p>
                <p data-aos="fade-right" data-aos-delay="700" class="P3">Pendataan Wilayah Kab. Bandung</p>
                <p class="col-md-3 p2" style="line-height: 1.2;">Sistem pendataan dengan map interaktif Tekan untuk melihat selengkapnya</p>
                <a href="#selengkapnya" type="button" class="btn btn-outline-info"
                    style="border-radius: 30px;">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!-- Container2 -->
    <div class="container-fluid text-center bg-light text-dark"
        style="height: 110vh; background-image: url('https://i.ibb.co.com/CVScp00/Frame-3-1-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row align-items-start">
            <div class="col" style="margin: 50vh;">
                <div class="custom-text-container">
                    <span class="hover-line"></span>
                    <p>Dukung kesuksesan UMKM <br>dan pendanaan yang tepat</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container3 -->
    <div class="container-fluid text-center bg-black text-light" id="selengkapnya"
        style="height: 70vh; background-image: url('https://i.ibb.co.com/2y6rtvB/Frame-5-1-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row align-items-center h-100">
            <div class="col text-start" style="max-width: 300px; margin: 0 auto; padding-top: 65px;">
                <h3 style="color: #00aaff; font-weight: 400; font-size: 20px; margin-bottom: 10px;">0.1</h3>
                <h4 style="font-weight: 500; margin-bottom: 20px;">Penggunaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengguna dapat melakukan pencarian dan informasi data UMKM dengan menggunakan maps interaktif,
                    pengguna internal dapat memantau perkembangan usaha anda melalui dashboard mulai dari status
                    legalitas hingga peluang pendanaan.
                </p>
            </div>
            <div class="col text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #00aaff; font-weight: 400; font-size: 20px; margin-bottom: 10px;">0.2</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengelolaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengelolaan data UMKM dilakukan dengan aman dan terstruktur, memastikan informasi legalitas dan
                    pendanaan selalu up-to-date.
                </p>
            </div>
            <div class="col text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #00aaff; font-weight: 400; font-size: 20px;margin-bottom: 10px;">0.3</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengembangan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Kami terus mengembangkan fitur-fitur baru untuk mendukung UMKM dalam berekspansi, termasuk ke pasar
                    internasional.
                </p>
            </div>
        </div>
    </div>
    <!-- Container4 -->
    <div class="container-fluid text-center bg-black text-light"
        style="height: 70vh; background-image: url('https://i.ibb.co.com/qn1pCh6/Frame-6-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row h-100 align-items-center">
            <!-- Teks di sebelah kiri -->
            <div class="col-md-4 text-start ps-5">
                <h5 style="font-size: 1.5rem; font-weight: 500;">Beberapa dokumentasi dari web ini</h5>
                <!-- Ubah ukuran judul di sini -->
                <p style="font-size: 0.9rem;">Gambar di tengah adalah dokumentasi web ini</p>
                <!-- Ubah ukuran teks kecil di sini -->
            </div>

            <!-- Carousel di tengah -->
            <div class="col-md-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden;">
                    <!-- Indikator Carousel -->
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
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="{{asset('welcome/umkm1.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm2.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm3.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm4.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 5 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/umkm5.png')}}" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <!-- Kontrol Carousel -->
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
            </div>

            <!-- Teks di sebelah kanan -->
            <div class="col-md-4 text-end pe-5">
                <h5 style="font-size: 1.5rem; font-weight: 500; text-align: left;">Penjelasan</h5>
                <!-- Ubah ukuran judul di sini -->
                <p style="font-size: 0.9rem; line-height: normal; text-align: left;">Aplikasi ini menginput pendataan
                    komoditi atau kekuatan UMKM di daerah kabupaten bandung. Maps interaktif sebagai alat utama untuk
                    memudahkan pendataan UMKM. Melalui peta ini, pihak terkait dapat dengan mudah melihat distribusi
                    UMKM dan dilengkapi dengan informasi detail mengenai status legalitas, jenis usaha, dan peluang
                    pendanaan.</p> <!-- Ubah ukuran teks kecil di sini -->
            </div>
        </div>
    </div>
    <!-- Container5 -->
    <div class="container-fluid text-center bg-black text-light"
        style="height: 110vh; background-image: url('https://i.ibb.co.com/THMjKqz/Frame-2-2-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <div class="row h-100 align-items-center">
            <!-- Bagian teks di kiri -->
            <div class="col-md-6 text-start ps-5">
                <!-- Teks pertama -->
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #00aaff;">1.0</span> Fitur
                </h5>
                <p style="font-size: 0.9rem;">Gambar di samping adalah beberapa fitur dari web ini</p>
                <br>
                <br>
                <!-- Teks kedua -->
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #00aaff;">2.0</span> Penjelasan mengenai fitur web ini
                </h5>
                <p style="font-size: 0.9rem; line-height: normal;">
                    Pengguna dapat melihat maps interaktif yang menampilkan lokasi Umkm di wilayah kabupaten bandung, di
                    lengkapi dengan profil usaha, status legalitas, dan kebutuhan pendanaan. fitur selanjutnya terdapat
                    indikator status legalitas yang memudahkan umKM memperbaharui dokumen usaha, dan menyediakan fitur
                    analitik visual berupa statistik, dan performa UMKM
                </p>
            </div>

            <!-- Carousel di kanan -->
            <div class="col-md-6 pe-5">
                <div id="carouselContainer5" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden; max-width: 90%; margin: auto;">
                    <!-- Indikator Carousel -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>

                    <!-- Isi Carousel -->
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="{{asset('welcome/slide1.jpeg')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/slide2.png')}}" class="d-block w-100" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <p style="font-size: 1rem;">Penjelasan slide kedua...</p>
                            </div> --}}
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="{{asset('welcome/slide3.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p style="font-size: 1rem;">Penjelasan slide keempat...</p>
                            </div>
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
            </div>
        </div>
    </div>
    <!-- Container6 -->
    <div class="container-fluid bg-primary text-white" id="tentang-kami"
        style="height: 50vh; display: flex; flex-direction: column; justify-content: center; padding-left: 15%; padding-right: 15%;">
        <h1 class="mb-3 text-start" style="font-size: 2rem;">Tentang kami</h1>
        <p class="mb-4 text-start" style="font-size: 1rem; line-height: 1.5;">
            Aplikasi PKWB adalah solusi digital yang dirancang untuk mempertemukan UMKM
            dengan Investor atau pihak terkait melalui platform berbasis maps interaktif.
        </p>
        <div class="text-start">
            <a href="{{ url('/about') }}" class="btn btn-outline-light btn-sm"
                style="border-radius: 30px;">Selengkapnya</a>
        </div>
    </div>
    <!-- Container7 (footer) -->
    <div class="container-fluid bg-white text-dark"
        style="height: 60vh; display: flex; flex-direction: column; justify-content: center; position: relative; padding: 0; background-image: url('https://i.ibb.co.com/F8pkDqB/Frame-1-4-waifu2x-art-noise3-scale.png'); background-size: cover; background-position: center;">
        <!-- Bagian Teks Kiri -->
        <div style="position: absolute; top: 50%; left: 10%; transform: translateY(-50%); text-align: left;">
            <p style="font-size: 1.8rem; line-height: normal; margin: 0; font-weight: 400;">
                Pendataan<br>
                Wilayah<br>
                Kabupaten<br>
                Bandung
            </p>
        </div>

        <!-- Bagian Dukungan -->
        <div class="text-center" style="margin-bottom: 60px;">
            <p style="font-size: 1.2rem; font-weight: 500; margin-bottom: 40px;">Di dukung oleh</p>
            <div style="display: flex; justify-content: center; gap: 40px;">
                <div style="width: 90px; height: 90px; background-color: #d3d3d3; border-radius: 50%;"></div>
                <div style="width: 90px; height: 90px; background-color: #d3d3d3; border-radius: 50%;"></div>
                <div style="width: 90px; height: 90px; background-color: #d3d3d3; border-radius: 50%;"></div>
            </div>
        </div>

        <!-- Bagian Kontak Kami -->
        <div class="text-center">
            <p style="font-size: 1.2rem; font-weight: 500; margin-bottom: 20px;">Kontak kami</p>
            <div style="display: flex; justify-content: center; gap: 40px;">
                <a href="#" style="color: black; text-decoration: none;">
                    <i class="bi bi-envelope-at" style="font-size: 2rem;"></i>
                </a>
                <a href="#" style="color: black; text-decoration: none;">
                    <i class="bi bi-instagram" style="font-size: 2rem;"></i>
                </a>
                <a href="#" style="color: black; text-decoration: none;">
                    <i class="bi bi-whatsapp" style="font-size: 2rem;"></i>
                </a>
            </div>
        </div>
    </div>




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
