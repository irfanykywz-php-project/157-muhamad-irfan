<x-app-layout title="Delete File">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">


                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-4 text-white mb-0">
                            <i class="bi bi-trash"></i>
                            Delete File
                        </h1>
                    </div>

                    <div class="card-body">
                        <form method="POST">
                            @csrf

                            @method('delete')

                            <div class="alert alert-danger small p-1">
                                Deleting files will reduce total download and user level.
                                Are you sure that you want to delete <b>{{ $file['name'] }}</b> file ?
                            </div>

                            <div class="d-flex gap-1">
                                <button class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" onclick="javascript:history.go(-1)">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
