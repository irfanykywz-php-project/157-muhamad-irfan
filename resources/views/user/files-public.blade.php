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

                        @foreach($files as $file)
                            <li class="list-group-item">

                                <div class="d-flex align-items-center">
                                    <i class="bi bi-inbox me-2"></i>
                                    <a class="fs- text-decoration-none" href="{{ url($file->code) }}">
                                        {{ $file->name }}
                                    </a>
                                    <span>({{ ReadableSize($file->size) }})</span>
                                </div>

                            </li>
                        @endforeach


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
