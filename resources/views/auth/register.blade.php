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
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
  <title>
    Laravel 
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Register</h4>
                    <p class="mb-0"></p>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- name --}}
                    <div class="mb-3">
                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="mb-3">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- password --}}
                    <div class="mb-3">
                        <input id="password"  type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="current-password" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- confirm password --}}
                    <div class="mb-3">
                        <input id="password-confirm"  type="password" class="form-control form-control-lg @error('password-confirm') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">

                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- gender --}}
                    <div class="form-group mb-3">
                      <label for="gender" class="font-weight-bolder">Gender:</label>
                      <div>
                          <input type="radio" name="gender" value="pria" required> Pria
                          <input type="radio" name="gender" value="wanita" required> Wanita
                          <input type="radio" name="gender" value="lainnya" required> Lainnya
                      </div>
                    </div>
                    {{-- remember me --}}
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Ingatkan Aku
                        </label>
                    </div>
                    {{-- submit --}}
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Register</button>
                    </div>

                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif --}}
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Sudah Punya Akun?
                    <a href="{{url('login')}}" class="text-primary text-gradient font-weight-bold">Log In</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
            background-size: cover;">
                  <span class="mask bg-gradient-primary opacity-6"></span>
                  <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                  <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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