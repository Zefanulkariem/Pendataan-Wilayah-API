<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png0') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png0') }}">
    <title>
        404 - Halaman Tidak Ditemukan
    </title>
    {{-- Fonts and icons      --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {{-- Nucleo Icons  --}}
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- Font Awesome Icons  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- CSS Files  --}}
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 virtual-reality">
    <main class="main-content mt-1 border-radius-lg">
        <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
            <div class="container">
                <div class="row pt-10">
                    <div class="col-lg-10">
                        <div class="d-flex justify-content-center">
                            <div class="me-auto">
                                <h1 class="text-uppercase display-1 font-weight-bold mb-0">Oops! Halaman yang Anda
                                    Cari Tidak Tersedia</h1>
                                <br>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h6 class="text-uppercase">Maaf, halaman yang Anda minta mungkin telah
                                            dipindahkan, dihapus, atau tidak pernah ada. Pastikan URL yang Anda
                                            masukkan sudah benar.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <p>© Pendataan Web Kab. Bandung
                        <script>
                            document.write(new Date().getFullYear())
                        </script>.
                        <b>All rights reserved.</b>
                    </p>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link text-muted">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/about')}}" class="nav-link text-muted">Tentang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
