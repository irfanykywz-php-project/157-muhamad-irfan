<x-app-layout title="{{ config('app.name') }}">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-secondary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-file"></i>
                            {{ $file['name'] }}
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-file-code"></i>
                            {{ $file['ext'] }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-person"></i>
                            <a class="text-decoration-none" href="{{ url('user/'.$user['name']) }}">
                                {{ $user['name'] }}
                            </a>
                            on
                            <a class="text-decoration-none" href="category/{{ $file['ext'] }}">
                                {{ $file['ext'] }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-upload"></i>
                            Uploaded: {{ $file['created_at'] }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-download"></i>
                            Downlaods: {{ $file['downloaded'] }}
                        </li>
                    </ul>
                </div>

                {{-- download button --}}
                <div class="text-center mb-3">
                    <a class="btn btn-primary" href="{{ url('download/'. $file['code']) }}">
                        Download {{ $file['name'] }}
                    </a>
                </div>

                <div class="card rounded-0 mb-3">
                    <div class="card-body text-center">
                        <p>
                            Download {{ $file['name'] }} by {{ $user['name'] }}
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ea maxime repellendus totam vitae? Alias aliquid atque blanditiis dignissimos distinctio dolor impedit laboriosam laudantium optio quasi, repellat saepe sint voluptatem.
                        </p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" class="form-control w-50" value="{{ url($file['code']) }}" readonly>
                        </li>

                        <li class="list-group-item">
                            Share button
                        </li>

                        <li class="list-group-item">
                            comment
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </div>

</x-app-layout>
