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
                            {{ $file['name'] }} (444 bytes)
                        </h4>

                        <p>
                            If the download doesn't start,
                        </p>

                        <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('download.start', encrypt($file['code'])) }}" data-turbo="false">
                                Download File (444 bytes)
                            </a>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <script>
        {{--setTimeout(function (){--}}
        {{--    window.location.href = '{{ route('download.start', encrypt($file['code'])) }}'--}}
        {{--}, 3000)--}}
    </script>

</x-app-layout>
