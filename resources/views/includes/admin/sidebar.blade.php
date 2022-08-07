<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">MENU</div>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.home') ? 'active' : '' }}"
                    href="{{ route('admin.home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.program.index') ? 'active' : '' }}"
                    href="{{ route('admin.program.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-th" aria-hidden="true"></i></div>
                    Program
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.donasi.index') ? 'active' : '' }}"
                    href="{{ route('admin.donasi.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-usd" aria-hidden="true"></i></div>
                    Donasi
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.donatur.index') ? 'active' : '' }}"
                    href="{{ route('admin.donatur.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    Donatur
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.laporan') ? 'active' : '' }}"
                    href="{{ route('admin.laporan') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    Laporan
                </a>
                <a class="nav-link {{ (Route::currentRouteName() == 'admin.profile') ? 'active' : '' }}"
                    href="{{ route('admin.profile') }}">
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