<x-app-layout title="User Profile - {{ config('app.name') }}">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-person"></i>
                            User Profile
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item text-center">
                            <img width="75" src="https://sfile.mobi/images/profil/user68151_1642584459.png" alt="profile">
                        </li>
                        <li class="list-group-item">
                            Name: username
                        </li>
                        <li class="list-group-item">
                            Level: Trusted User
                        </li>
                        <li class="list-group-item">
                            Total Downloaded: 1903
                        </li>
                        <li class="list-group-item">
                            User Uploads: <a href="{{ url('/user/username/files') }}">333</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
