<x-app-layout title="File List" turbofresh="true">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="mb-0 fs-4 text-white">
                            <i class="bi bi-folder"></i>
                            Files
                        </h1>
                    </div>

                    <div class="card-body">

                        <div id="toolbar">
                            <button id="remove" class="btn btn-danger" disabled
                            data-url="{{ route('admin.files.destroy') }}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                        <table id="table"
                               data-url="{{ route('admin.files.show') }}"
                        ></table>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        @vite([
            'resources/css/bootstrap-table.css',
            'resources/js/bootstrap-table.js',
            'resources/js/admin/files.js',
        ])
    @endpush

</x-app-layout>
