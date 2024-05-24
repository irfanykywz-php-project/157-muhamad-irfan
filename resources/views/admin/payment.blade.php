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

                        <div id="toolbar" class="d-flex gap-1">
                            <div class="dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    id="update"
                                    data-bs-toggle="dropdown"
                                    data-bs-auto-close="true"
                                    aria-expanded="false" disabled
                                    data-url="{{ route('admin.payment.update') }}">
                                    Update Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="update">
                                    <li><div data-status="success" class="dropdown-item update">success</div></li>
                                    <li><div data-status="reject" class="dropdown-item update">reject</div></li>
                                    <li><div data-status="pending" class="dropdown-item update">pending</div></li>
                                </ul>
                            </div>
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
