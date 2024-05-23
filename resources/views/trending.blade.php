<x-app-layout title="Trending">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-ladder"></i>
                            Trending
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        @if(count($files) > 0)
                            @foreach($files as $file)
                                <li class="list-group-item">

                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-inbox me-2"></i>
                                        <a class="fs- text-decoration-none" href="{{ route('file', $file->code) }}">
                                            {{ $file->name }}
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <span class="me-2">{{ $file->size }}</span>
                                        <span>Uploaded: {{ $file->created_at }}</span>
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
                                {{ $files->onEachSide(0)->links() }}
                            </div>
                        </div>
                        <div class="m-3">
                            <form class="" action="{{ route('trending') }}" method="GET">
                                <div class="d-flex gap-1">
                                    <label for="">Jump: </label>
                                    <input type="text" name="files" required value="{{ request()->get('files') }}"/>
                                    <input type="submit" value="Go"/>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
