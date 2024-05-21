<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">

        <x-app-name class="navbar-brand"/>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse me-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'text-dark' : 'text-white' }}" href="{{ route('home') }}">
                        <i class="bi bi-upload"></i>
                        Upload
                    </a>
                </li>

                @if(Auth::check())
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
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-left"></i>
                            Logout
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

            </ul>
        </div>

    </div>
</nav>
