<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">

        <x-app-name class="navbar-brand"/>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse me-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(!auth()->user()?->role('admin'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'text-dark' : 'text-white' }}" href="{{ route('home') }}">
                            <i class="bi bi-upload"></i>
                            Upload
                        </a>
                    </li>
                @endif

                @if(auth()->user()?->role('user'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile') ? 'text-dark' : 'text-white' }}" href="{{ route('user.profile') }}">
                            <i class="bi bi-person"></i>
                            My Panel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('files') ? 'text-dark' : 'text-white' }}" href="{{ route('user.files') }}">
                            <i class="bi bi-folder"></i>
                            My Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reveneu') ? 'text-dark' : 'text-white' }}" href="{{ route('user.reveneu') }}">
                            <i class="bi bi-currency-dollar"></i>
                            My Reveneu
                        </a>
                    </li>
                @elseif(auth()->user()?->role('admin'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin') ? 'text-dark' : 'text-white' }}" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-app"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/files') ? 'text-dark' : 'text-white' }}" href="{{ route('admin.files') }}">
                            <i class="bi bi-folder"></i>
                            Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/payment') ? 'text-dark' : 'text-white' }}" href="{{ route('admin.payment') }}">
                            <i class="bi bi-bank"></i>
                            Payment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/user') ? 'text-dark' : 'text-white' }}" href="{{ route('admin.user') }}">
                            <i class="bi bi-person"></i>
                            User
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('latest') ? 'text-dark' : 'text-white' }}" href="{{ route('latest') }}">
                            <i class="bi bi-card-list"></i>
                            Latest
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('trending') ? 'text-dark' : 'text-white' }}" href="{{ route('trending') }}">
                            <i class="bi bi-fire"></i>
                            Trending
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'text-dark' : 'text-white' }}" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'text-dark' : 'text-white' }}" href="{{ route('register') }}">
                            <i class="bi bi-person-add"></i>
                            Register
                        </a>
                    </li>
                @endif

                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-left"></i>
                            Logout
                        </a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>
