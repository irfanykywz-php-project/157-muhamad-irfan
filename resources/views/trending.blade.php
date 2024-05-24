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

                    <x-files :files="$files" :jump="route('trending')"/>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
