<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img src="{{ asset('welcome/images/PUBK_logo.png') }}" class="navbar-brand-img" alt="main_logo" style="width: 80px;">
            {{-- <span class="ms-1 font-weight-bold">PUBK</span> --}}
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="sidebar">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('dashboard-admin') ? 'active' : '' }}"
                    href="{{ route('Adminhome') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Dasbor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('dashboard-admin/user*') ? 'active' : '' }}"
                    href="{{ route('Adminuser.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">manage_accounts</i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-admin/spot*') ? 'active' : '' }}"
                    href="{{ route('Adminspot.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">pin_drop</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Lokasi Umkm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-admin/keuangan/menu*') ? 'active' : '' }}"
                    href="{{ route('Adminkeuangan.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Aprove Keuangan</span>
                    <span id="checkNotifications">
                        {{-- {{ dd($meetNotification) }} --}}
                        @if(isset($uangNotification) && $uangNotification->count() > 0)
                            <span id="keuangan-notification-count" class="badge bg-danger" style="margin-left: 5px;">
                                {{ $uangNotification->count() }}
                            </span>
                        @endif
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-admin/cek-legal/menu*') ? 'active' : '' }}"
                    href="{{ route('AdminlegalUsaha.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">fact_check</i>
                    </div>
                    <span class="nav-link-text ms-1">Cek Legalitas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-admin/meeting*') ? 'active' : '' }}"
                    href="{{ route('Adminmeeting.menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size:20px;" class="material-icons text-primary">event_available</i>
                    </div>
                    <span class="nav-link-text ms-1">Ajuan Meeting</span>
                    <span id="checkNotifications">
                        @if(isset($meetNotification) && $meetNotification->count() > 0)
                            <span id="meeting-notification-count" class="badge bg-danger" style="margin-left: 5px;">
                                {{ $meetNotification->count() }}
                            </span>
                        @endif
                    </span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akun</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('dashboard-admin/profile') ? 'active' : '' }}"
                    href="{{ route('Adminprofile.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
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
                url: '{{ route('Adminuang.notification') }}', // Route untuk mengambil jumlah notifikasi
                type: 'GET',
                success: function(response) {
                    console.log("Response:", response);
                    // Update jumlah notifikasi di menu
                    if (response.uangCount > 0) {
                        $('#keuangan-notification-count').text(response.uangCount).show();
                    } else {
                        $('#keuangan-notification-count').hide();
                    }
                },
                error: function() {
                    console.log('Gagal memuat notifikasi');
                }
            });

            $.ajax({
                url: '{{ route('Adminmeeting.notification') }}', // Route untuk mengambil jumlah notifikasi
                type: 'GET',
                success: function(response) {
                    console.log("Response:", response);
                    // Update jumlah notifikasi di menu
                    if (response.meetCount > 0) {
                        $('#meeting-notification-count').text(response.meetCount).show();
                    } else {
                        $('#meeting-notification-count').hide();
                    }
                },
                error: function() {
                    console.log('Gagal memuat notifikasi');
                }
            });
        }

        // Memanggil fungsi setiap 5 detik
        setInterval(checkNotifications, 5000);
    </script>
</aside>
