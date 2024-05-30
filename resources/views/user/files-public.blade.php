<x-app-layout title="{{ $user['name'] }}'s Files">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-file"></i>
                            {{ $user['name'] }}'s Files
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">

                        @if(count($files) > 0)
                            @foreach($files as $file)
                                <li class="list-group-item">

                                    <div class="d-flex align-items-center">
                                        <x-file-icon :ext="$file->ext"/>
                                        <a class="fs- text-decoration-none" href="{{ route('file', $file->code) }}">
                                            {{ $file->name }}
                                        </a>
                                        <span class="ps-1">({{ $file->size }})</span>
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
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
