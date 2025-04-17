<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img src="{{ asset('admin/assets/logo/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo" width="50" height="50">
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
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                    href="{{ route('Master Adminhome') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dasbor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/user*') ? 'active' : '' }}"
                    href="{{ route('Master Adminuser.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/kecamatan*') ? 'active' : '' }}"
                    href="{{ route('Master Adminkecamatan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-square-pin text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Kecamatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/desa*') ? 'active' : '' }}"
                    href="{{ route('Master Admindesa.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-square-pin text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Desa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/jenis-umkm*') ? 'active' : '' }}"
                    href="{{ route('Master Adminjenis-umkm.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tag text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Kategori Umkm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/spot*') ? 'active' : '' }}"
                    href="{{ route('Master Adminspot.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-pin-3 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Lokasi Umkm</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
    <a class="nav-link {{ request()->is('dashboard/meeting*') ? 'active' : '' }}"
        href="{{ route('Master Adminmeeting.menu') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Pengajuan Meeting</span>
        @if (isset($meetNotification) && $meetNotification->count() > 0)
            <span class="badge bg-danger ms-2">{{ $meetNotification->count() }}</span>
        @endif
    </a>
</li>
            
            <!-- Aprove Keuangan -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/keuangan/menu*') ? 'active' : '' }}"
                    href="{{ route('Master Adminkeuangan.menu') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-coins text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Aprove Keuangan</span>
                    @if (isset($uangNotification) && $uangNotification->count() > 0)
                        <span class="badge bg-danger ms-2">{{ $uangNotification->count() }}</span>
                    @endif
                </a>
            </li>

            <!-- Log Aktivitas -->
            <li class="nav-item">
                <a href="{{ route('Master Adminlogaktivitas.index') }}" class="nav-link {{ request()->is('dashboard/logaktivitas*') ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-history text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Log Aktivitas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/profile') ? 'active' : '' }}"
                    href="{{ route('Master Adminprofile.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
