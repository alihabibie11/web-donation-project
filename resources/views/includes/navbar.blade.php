<nav class="navbar navbar-expand-lg navbar-light">
    <a href="#">
        <img width="55" style="margin-right: 0.75rem" src="{{ asset('assets/images/material/icon_logo.jpg') }}"
            alt="" />
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
        aria-labelledby="targetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white border-0">
                <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                    <a class="modal-title" id="targetModalLabel">
                        <img width="55" style="margin-top: 0.5rem"
                            src="{{ asset('assets/images/material/icon_logo.jpg') }}" alt="" />
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                    <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer border-0 gap-3" style="padding: 2rem; padding-top: 0.75rem">
                    <button class="btn btn-default btn-no-fill">Masuk</button>
                    <button class="btn btn-fill text-white">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item {{ (Route::currentRouteName() == 'home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ (request()->is('list_program')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('list_program') }}">Program Donasi</a>
            </li>
            <li class="nav-item {{ (request()->is('cek_donasi')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cek_donasi') }}">Cek Donasi</a>
            </li>
            @auth
            @php $role = Illuminate\Support\Facades\Auth::user()->roles; @endphp
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ $role == 'ADMIN' ? route('admin.home') : route('cek_donasi') }}">Dashboard</a>
            </li>
            @endauth
        </ul>
        <div class="gap-3">
            @auth
            <label style="margin-right: 10px;">{{ Illuminate\Support\Facades\Auth::user()->name }}</label><i
                class="fa fa-user" aria-hidden="true" style="font-size: 24px; color: #27c499;"></i>
            <form action="{{ route('logout') }}" method="POST"
                style="display: inline-block !important; background: none; border: none;">
                @csrf
                <button type="submit" style="border: none !important;
                background: none !important;">
                    <label style="margin-right: 10px; margin-left: 10px;">Log Out</label><i class="fa fa-sign-out"
                        aria-hidden="true" style="font-size: 24px; color: #27c499;"></i>
                </button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="btn btn-default btn-no-fill">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-fill text-white">Register</a>
            @endguest
        </div>
    </div>
</nav>