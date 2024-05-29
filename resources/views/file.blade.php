<x-app-layout title="{{ $file->name }}">

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
                        <button class="btn btn-primary" disabled>Loading...</button>
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
                            <a id="comment" class="text-decoration-none" href="javascript:;">Show Comments</a>
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            document.getElementById('share').addEventListener('click', function (){
                navigator.share({
                    title: '{{ $file->name }}',
                    url: '{{ url()->current() }}',
                })
            })

            document.getElementById('comment').addEventListener('click', function (){
                console.log('show comment...')
            })

            // document.addEventListener('DOMContentLoaded', function (){
            // })
            let counter = 5,
                downloadButton = $(".download-button"),
                countDown = $(".countdown");
            setInterval(function(){
                console.log(counter);
                $('button', countDown).html(`Loading...${counter}`);
                counter--;
                if (counter === 0) {
                    countDown.addClass('d-none');
                    downloadButton.removeClass('d-none');
                }
            }, 1000);
        </script>
    @endpush

</x-app-layout>
