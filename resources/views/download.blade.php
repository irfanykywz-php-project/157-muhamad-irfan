<x-app-layout title="{{ $file['name'] }}" robots="noindex, nofollow">

    <div class="container mt-5 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card mb-3">

                    <div class="card-body text-center">

                        <h3 class="fs-5">
                            Downloading...
                        </h3>

                        <h4 class="text-primary my-4 fs-6">
                            {{ $file['name'] }} ({{ $file['size'] }})
                        </h4>

                        <p>
                            If the download doesn't start,
                        </p>

                        <div class="text-center">
                            <a class="btn btn-primary download-button" href="{{ route('download.start', encrypt($file['code'])) }}" data-turbo="false">
                                Download File ({{ $file['size'] }})
                            </a>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            let autoDownload = true;
            $(".download-button").on('click', function (){
                autoDownload = false
            })
            setTimeout(function (){
                if (autoDownload){
                    window.location.href = '{{ route('download.start', encrypt($file['code'])) }}'
                }
            }, 2000)
        </script>
    @endpush

</x-app-layout>
