<x-app-layout title="User List" turbofresh="true">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="mb-0 fs-4 text-white">
                            <i class="bi bi-person"></i>
                            User
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
                                    data-url="{{ route('admin.user.update') }}">
                                    Update Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="update">
                                    <li><div data-status="active" class="dropdown-item update">active</div></li>
                                    <li><div data-status="banned" class="dropdown-item update">banned</div></li>
                                </ul>
                            </div>
                            <button id="remove" class="btn btn-danger" disabled
                                    data-url="{{ route('admin.user.destroy') }}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                        <table id="table"
                               data-url="{{ route('admin.user.show') }}"
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
            'resources/js/admin/user.js',
        ])
    @endpush

</x-app-layout>
