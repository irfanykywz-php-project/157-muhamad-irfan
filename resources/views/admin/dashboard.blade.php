<x-app-layout title="My Dashboard">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                    </div>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('admin.files') }}">
                                <i class="text-dark bi bi-folder"></i>
                                Files
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('admin.payment') }}">
                                <i class="text-dark bi bi-bank"></i>
                                Payment
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('admin.user') }}">
                                <i class="text-dark bi bi-person"></i>
                                User
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


</x-app-layout>
