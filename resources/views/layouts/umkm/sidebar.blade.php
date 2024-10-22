<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
            <img src="{{asset('admin/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">PWKB</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="sidebar">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('Umkmhome') ? 'active' : '' }}" href="{{ route('Umkmhome')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dasbor</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tabel</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('UmkmlegalUsaha.index') ? 'active' : '' }}" href="{{ route('UmkmlegalUsaha.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
                    </div>
                <span class="nav-link-text ms-1">Legalitas Usaha</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('Umkmkeuangan.index') ? 'active' : '' }}" href="{{ route('Umkmkeuangan.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-credit-card text-info text-sm opacity-10"></i>
                    </div>
                <span class="nav-link-text ms-1">Keuangan</span> {{-- income & outcome | perbulan --}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('Umkmoperasional.index') ? 'active' : '' }}" href="{{ route('Umkmoperasional.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-industry text-warning text-sm opacity-10"></i>
                    </div>
                <span class="nav-link-text ms-1">Operasional</span> {{-- ada berapa karyawannya --}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('Umkmmarketing.index') ? 'active' : '' }}" href="{{ route('Umkmmarketing.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-success text-sm opacity-10"></i>
                    </div>
                <span class="nav-link-text ms-1">Marketing</span> {{-- target income perbulan/tahun/5 tahun --}}
                </a>
            </li>
            
            
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akun</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('Umkmprofile.index') ? 'active' : '' }}" href="{{ route('Umkmprofile.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-in.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-up.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer mx-3 ">
        <a href="#" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
    </div>
</aside>