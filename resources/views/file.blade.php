<x-app-layout title="{{ $file->name }}" turbofresh="true">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-secondary">
                        <h1 class="fs-3 text-white">
                            <x-file-icon :ext="$file->ext"/>
                            {{ $file->name }}
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-file-code"></i>
                            {{ $file->ext }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-person"></i>
                            <a class="text-decoration-none" href="{{ route('public.profile', $file->user->name) }}">
                                {{ $file->user->name }}
                            </a>
                            on
                            <a class="text-decoration-none" href="{{ route('category', $file->ext) }}">
                                {{ $file->ext }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-upload"></i>
                            Uploaded: {{ $file->created_at }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-download"></i>
                            Downloads: {{ $file->downloaded }}
                        </li>
                    </ul>
                </div>

                {{-- download button --}}
                <div class="text-center mb-3">
                    <div class="countdown">
                        <button class="btn btn-primary" disabled>Scanning files...</button>
                    </div>
                    <a class="btn btn-primary download-button d-none" href="{{ route('download', $file->code) }}" rel="noindex nofollow noreferrer">
                        Download {{ $file->name }}
                    </a>
                </div>

                <div class="card rounded-0 mb-3">
                    <div class="card-body text-center">
                        <p>
                            Download {{ $file->name }} by {{ $file->user->name }}
                        </p>
                        <p>
                            @if($file->description)
                                {{ $file->description }}
                            @else
                                Sfile.mobi is a free file-sharing site. 5GB of free cloud server storage space, a high-speed, dedicated server for upload and download.
                            @endif
                        </p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" class="form-control w-50" value="{{ url($file->code) }}" readonly>
                        </li>

                        <li class="list-group-item">
                            Share on
                            <a class="text-decoration-none" aria-label="Share to Facebook" href="https://www.facebook.com/share.php?u={{ url()->current() }}" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a class="text-decoration-none" aria-label="Share to Twitter" href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            or
                            <a id="share" class="text-decoration-none" href="javascript:;">
                                <i class="bi bi-share"></i>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a id="showComments" data-appi class="text-decoration-none" href="javascript:;">Show Comments</a>
                            <div id="fb-root"></div>
                            <div id="comments" class="fb-comments" data-href="{{ url()->current() }}" data-appid="{{ env('FACEBOOK_APP_ID', 'null') }}" data-numposts="5" width="100%" data-colorscheme="light"></div>
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        @vite([
            'resources/js/file.js',
        ])
    @endpush

</x-app-layout>
