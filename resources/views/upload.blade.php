<x-app-layout title="Upload - {{ config('app.name') }}">

    <div class="m-auto">

        <h1 class="fs-3 border-bottom text-center mb-3 pb-3">
            Upload
        </h1>

        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="">file</label>
                <input class="form-control" type="file" name="file">
            </div>

            <div class="mb-3">
                <label for="">description</label>
                <input class="form-control" type="text" name="description">
            </div>

            <div class="mb-3">
                <label for="">password</label>
                <input class="form-control" type="text" name="password">
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">submit</button>
            </div>

        </form>

    </div>

</x-app-layout>
