<ul class="nav justify-content-center align-items-center border-top mt-3">
    <li class="nav-item">
        <a class="nav-link px-1" href="{{ route('pages', 'member-payment') }}">Member Payments</a>
    </li>
    <li class="nav-item">
        |
    </li>
    <li class="nav-item">
        <a class="nav-link px-1" href="{{ route('pages', 'privacy') }}">Privacy Policy</a>
    </li>
    <li class="nav-item">
        |
    </li>
    <li class="nav-item">
        <a class="nav-link px-1" href="{{ route('pages', 'terms') }}">Terms of Services</a>
    </li>
    <li class="nav-item">
        |
    </li>
    <li class="nav-item">
        <a class="nav-link px-1" href="{{ route('pages', 'contact') }}">Contact</a>
    </li>
</ul>

<div class="text-center border-top py-3">
    <p class="small mb-0">
        &copy; {{ date('Y') }} <x-app-name class="text-decoration-none"/>
        <br>
        Free file sharing service
    </p>
</div>
