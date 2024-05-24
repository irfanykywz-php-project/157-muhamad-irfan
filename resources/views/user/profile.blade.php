<x-app-layout title="My Panel">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                @if(session('error'))
                    <div class="alert alert-danger mt-1 mb-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-primary d-flex align-items-center">
                    <div>
                        <img class="p-3" width="75" src="{{ auth()->user()->photoUrl(auth()->user()->photo) }}" alt="user">
                    </div>
                    <div>
                        <h1 class="fs-3 text-white">
                            {{ auth()->user()->name }} Panel
                        </h1>
                    </div>
                </div>

                <div class="alert alert-success d-flex align-items-center gap-3 my-3">
                    <img width="30" src="{{ asset('assets/news.svg') }}" alt="news">
                    <p class="mb-0">
                        Rate dibagi berdasarkan Level User, Level user dihitung berdasarkan Total Download.
                        <a href="{{ url('p/member-payment') }}">
                            Baca Selengkapnya
                        </a>
                    </p>
                </div>

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div>
                                Your Revenue:
                                <b>Rp {{ ReadableNumber($user['reveneu'], '.') }}</b>
                            </div>
                            <div>
                                Sfile Level:
                                <b>{{ $level }}</b>
                            </div>
                            <div>
                                Total Downloaded: <b>{{ ReadableNumber($total_download, '.') }}</b>
                            </div>
                            <div>
                                Total Earning:
                                <b>Rp {{ ReadableNumber($total_earning, '.') }}</b>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('home') }}">
                                <i class="text-dark bi bi-upload"></i>
                                Upload File
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href=" {{ route('user.files') }}">
                                <i class="text-dark bi bi-file"></i>
                                My Uploads
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('user.reveneu') }}">
                                <i class="text-dark bi bi-cash"></i>
                                My Reveneu
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="javascript:;"
                               data-bs-toggle="modal" data-bs-target="#paymentModal">
                                <i class="text-dark bi bi-credit-card"></i>
                                Request Payment
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('user.payment') }}">
                                <i class="text-dark bi bi-person-workspace"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('user.profile.edit') }}">
                                <i class="text-dark bi bi-person"></i>
                                Profile
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('logout') }}">
                                <i class="text-dark bi bi-box-arrow-in-right"></i>
                                Logout
                            </a>
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </div>

    @include('user.payment-request')

</x-app-layout>
