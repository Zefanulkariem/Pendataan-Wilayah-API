<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img src="{{ asset('admin/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
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
                        <i style="font-size:20px;" class="material-icons text-primary">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Dasbor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/user*') ? 'active' : '' }}"
                    href="{{ route('Master Adminuser.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">manage_accounts</i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/kecamatan*') ? 'active' : '' }}"
                    href="{{ route('Master Adminkecamatan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-square-pin text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Kecamatan</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/desa*') ? 'active' : '' }}"
                    href="{{ route('Master Admindesa.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">map</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Desa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/jenis-umkm*') ? 'active' : '' }}"
                    href="{{ route('Master Adminjenis-umkm.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Kategori Umkm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/spot*') ? 'active' : '' }}"
                    href="{{ route('Master Adminspot.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">pin_drop</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Lokasi Umkm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/keuangan/menu*') ? 'active' : '' }}"
                    href="{{ route('Master Adminkeuangan.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">verified</i>
                    </div>
                    <span class="nav-link-text ms-1">Aprove Keuangan</span>
                    <span id="checkNotificationsWrapper">
                        <div data-i18n="Analytics" style="display: flex; gap: 59px">
                            <span id="checkNotifications">
                                @if (isset($uangNotification) && $uangNotification->count() > 0)
                                <span id="keuangan-notification-count" class="badge bg-danger" style="margin-left: 5px;">
                                    {{ $uangNotification->count() }}
                                </span>
                                @endif
                            </span>
                        </div>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/cek-legal/menu*') ? 'active' : '' }}"
                    href="{{ route('Master AdminlegalUsaha.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">fact_check</i>
                    </div>
                    <span class="nav-link-text ms-1">Cek Legalitas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/meeting*') ? 'active' : '' }}"
                    href="{{ route('Master Adminmeeting.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Ajuan Meeting</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akun</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/profile') ? 'active' : '' }}"
                    href="{{ route('Master Adminprofile.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">account_circle</i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
        </ul>
    </div>
    <script>
        // Fungsi untuk memeriksa notifikasi baru setiap 5 detik
        function checkNotifications() {
            $.ajax({
                url: '{{ route('Master Adminuang.notification') }}', // Route untuk mengambil jumlah notifikasi
                type: 'GET',
                success: function(response) {
                    // Update jumlah notifikasi di menu
                    if (response.uangCount > 0) {
                        $('#keuangan-notification-count').text(response.uangCount).show();
                    } else {
                        $('#keuangan-notification-count').hide();
                    }
                },
                error: function() {
                    console.log('Gagal memuat notifikasi leuangan');
                }
            });
        }

        // Memanggil fungsi setiap 5 detik
        setInterval(checkNotifications, 5000);
    </script>
</aside>
