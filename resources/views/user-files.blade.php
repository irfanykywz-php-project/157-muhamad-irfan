<x-app-layout title="User Files - {{ config('app.name') }}">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-file"></i>
                            User Files
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">

                        @for ($i = 0; $i <= 10; $i++)
                            <li class="list-group-item">

                                <div class="d-flex align-items-center">
                                    <i class="bi bi-inbox me-2"></i>
                                    <a class="fs- text-decoration-none me-1" href="/file">
                                        Files Name
                                    </a>
                                    <span>(254 bytes)</span>
                                </div>

                            </li>
                        @endfor

                    </ul>
                    <div class="border-bottom">
                        pagination
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
