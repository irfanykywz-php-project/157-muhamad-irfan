<x-app-layout title="Payment List" turbofresh="true">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="mb-0 fs-4 text-white">
                            <i class="bi bi-bank"></i>
                            Payment
                        </h1>
                    </div>

                    <div class="card-body">

                        <div id="toolbar">
                            <button id="remove" class="btn btn-primary" disabled
                                    data-url="{{ route('admin.payment.update') }}">
                                <i class="bi bi-globe"></i> Update
                            </button>
                        </div>
                        <table id="table"
                               data-url="{{ route('admin.payment.show') }}"
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
            'resources/js/admin/payment.js',
        ])
    @endpush

</x-app-layout>
