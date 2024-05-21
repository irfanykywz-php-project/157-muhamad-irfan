<x-app-layout title="Search: {{ request()->get('q') }}">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-search"></i>
                            {{ $files_count }} {{ request()->get('q') }} files
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">

                        @foreach($files as $file)
                            <li class="list-group-item">

                                <div class="d-flex align-items-center">
                                    <i class="bi bi-inbox me-2"></i>
                                    <a class="fs- text-decoration-none" href="{{ url($file->code) }}">
                                        {{ $file->name }}
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <span class="me-2">{{ ReadableSize($file->size) }}</span>
                                    <span>Uploaded: {{ ReadableDate($file->created_at) }}</span>
                                </div>

                            </li>
                        @endforeach

                    </ul>
                    @if($files->hasPages())
                        <div class="border-bottom">
                            <div class="m-3 mb-0">
                                {{ $files->onEachSide(0)->withQueryString()->links() }}
                            </div>
                        </div>
                    @endif

                </div>

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-search"></i>
                            Search
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush p-3">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="search" name="q" value="{{ request()->get('q') }}">
                                <button class="btn btn-primary" type="submit">search</button>
                            </div>
                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
