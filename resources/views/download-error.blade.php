<x-app-layout title="{{ config('app.name') }}">

    <div class="container mt-5 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card mb-3">

                    <div class="card-body text-center">

                        <h3 class="fs-5">
                            File not Found!
                        </h3>

                        <a class="text-decoration-none" href="{{ route('file', $code) }}">Back to File</a>

                    </div>

                </div>


            </div>
        </div>
    </div>

</x-app-layout>
