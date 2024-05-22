<x-app-layout title="My Files">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-person-circle fs-2"></i>
                            {{ auth()->user()->name }}'s Files
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush p-3">
                        <form action="{{ route('user.files') }}" method="GET">
                            <label for="">
                                Search Files:
                            </label>
                            <div class="input-group">
                                <input class="form-control" type="search" name="q" value="{{ request()->get('q') }}">
                                <button class="btn btn-primary" type="submit">search</button>
                            </div>
                        </form>
                    </ul>
                </div>

                @if(request()->get('q') AND count($files) < 1)
                    <div class="card rounded-0 mb-3">
                        <div class="card-header rounded-0 bg-warning">
                            <h1 class="fs-6 fw-normal mb-0 py-2">
                                No {{ request()->get('q') }} File Found,
                                <a href="{{ route('user.files') }}">back</a>
                            </h1>
                        </div>
                    </div>
                @else
                    <div class="card rounded-0 mb-3">
                        <div class="card-header rounded-0 bg-primary">
                            <h1 class="fs-5 text-white">
                                @if($q = request()->get('q'))
                                    {{ $files_count }} {{ $q }} Files
                                @else
                                    {{ $files_count }} Files
                                @endif
                            </h1>
                        </div>
                        <ul class="list-group list-group-flush">

                            @if(count($files) > 0)
                                @foreach($files as $file)
                                    <li class="list-group-item">

                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-inbox me-2"></i>
                                            <a class="fs- text-decoration-none" href="{{ url($file->code) }}">
                                                {{ $file->name }}
                                            </a>
                                            <span class="ms-1">
                                        ({{ ReadableSize($file->size) }})
                                    </span>
                                        </div>
                                        <div class="d-flex">
                                            <span class="me-2">Download: {{ $file->downloaded }}</span>
                                            <span>Uploaded: {{ ReadableDate($file->created_at) }}</span>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center">
                                            <a class="text-decoration-none" href="{{ route('user.files') . '/e/' . $file->code }}">Edit</a>
                                            <span>|</span>
                                            <a class="text-decoration-none text-danger" href="{{ route('user.files') . '/d/' . $file->code }}">Delete</a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p class="my-3 fs-5 text-center">
                                    Files data not available...
                                </p>
                            @endif

                        </ul>
                        @if($files->hasPages())
                            <div class="border-bottom">
                                <div class="m-3 mb-0">
                                    {{ $files->onEachSide(0)->withQueryString()->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
