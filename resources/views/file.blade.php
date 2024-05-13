<x-app-layout title="{{ config('app.name') }}">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-secondary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-file"></i>
                            FileName
                        </h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-file-code"></i>
                            file type
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-person"></i>
                            <a class="text-decoration-none" href="user/username">user</a> on <a class="text-decoration-none" href="category/category">category</a>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-upload"></i>
                            Uploaded: 19 may 2029
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-download"></i>
                            Downlaods: 10
                        </li>
                    </ul>
                </div>

                {{-- download button --}}
                <div class="text-center mb-3">
                    <a class="btn btn-primary" href="download/file">
                        Download File
                    </a>
                </div>

                <div class="card rounded-0 mb-3">
                    <div class="card-body">
                        <p>
                            Download Filename by username
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ea maxime repellendus totam vitae? Alias aliquid atque blanditiis dignissimos distinctio dolor impedit laboriosam laudantium optio quasi, repellat saepe sint voluptatem.
                        </p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" class="form-control" value="file_url">
                        </li>

                        <li class="list-group-item">
                            Share button
                        </li>

                        <li class="list-group-item">
                            comment
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </div>

</x-app-layout>
