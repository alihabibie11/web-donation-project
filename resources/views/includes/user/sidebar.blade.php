<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">MENU</div>
                <a class="nav-link {{ (Route::currentRouteName() == 'user.index') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'user.riwayat_donasi') ? 'active' : '' }}"
                    href="{{ route('user.riwayat_donasi') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-th" aria-hidden="true"></i></div>
                    Riwayat Donasi
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'user.profile') ? 'active' : '' }}"
                    href="{{ route('user.profile') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                    Profile
                </a>
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>