<x-app-layout title="{{ $user['name'] }}'s Profile">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-person"></i>
                            {{ $user['name'] }}'s Profile
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item text-center">
                            <img width="75" src="https://sfile.mobi/images/profil/user68151_1642584459.png" alt="profile">
                        </li>
                        <li class="list-group-item">
                            Name: <b>{{ $user['name'] }}</b>
                        </li>
                        <li class="list-group-item">
                            Level: <b>New User</b>
                        </li>
                        <li class="list-group-item">
                            Total Downloaded: <b>{{ $total_download }}</b>
                        </li>
                        <li class="list-group-item">
                            {{ $user['name'] }}'s Uploads:
                            <a class="text-decoration-none fw-bold" href="{{ route('public.files', [$user['name']]) }}">
                                {{ $total_files }}
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
