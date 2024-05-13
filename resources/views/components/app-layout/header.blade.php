<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <x-app-name class="navbar-brand"/>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse me-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('upload') ? 'active' : '' }}" href="{{ route('upload') }}">
                        <i class="bi bi-upload"></i>
                        Upload
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('latest') }}">Latest
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trending') }}">Trending
                    </a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('files') }}">Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register
                        </a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>
