<x-app-layout title="Level User">

    <div class="container mb-auto mt-1">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="mb-3 p-3 text-bg-primary fs-3">
                    <i class="bi bi-info-circle"></i>
                    User Level
                </div>

                <article>

                    <ul class="list-unstyled">
                        @foreach(config('level.rate') as $level_name => $level)

                            <li>
                                <b>{{ $level_name }}</b>
                                <ul>
                                    <li>Minimum Download: {{ ReadableNumber($level['require_downloaded'], '.') }}</li>
                                    <li>Rate: Rp {{ ReadableNumber($level['rate_payment'], '.') }}</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </article>

            </div>
        </div>
    </div>

</x-app-layout>
