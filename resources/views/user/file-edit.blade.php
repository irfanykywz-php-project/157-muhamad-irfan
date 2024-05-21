<x-app-layout title="Edit File">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">


                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-4 text-white mb-0">
                            <i class="bi bi-file"></i>
                            Edit File
                        </h1>
                    </div>


                    <div class="card-body">
                        <form method="POST">
                            @csrf

                            @method('put')

                            <input type="hidden" name="ext" value="{{ $file['ext'] }}">

                            <div>
                                <p>
                                    File: <b>{{ $file['name'] }}</b>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label for="">Filename:</label>
                                <div class="input-group align-items-center">
                                    <input class="form-control" name="name" type="text" value="{{ explode('.', $file['name'])[0] }}">
                                    <span>.{{ $file['ext'] }}</span>
                                </div>
                                @error('name')
                                <span class="form-text text-danger">
                                        {{ $errors->first('name')  }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description:</label>
                                <textarea class="form-control" name="description" rows="3">{{ $file['description'] }}</textarea>
                                @error('description')
                                <span class="form-text text-danger">
                                        {{ $errors->first('description')  }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 small">
                                Renaming a file or description that violates the
                                <a href="{{ url('p/terms') }}">TOS</a>, will cause your account to be suspended.
                            </div>

                            <div class="d-flex gap-1">
                                <button class="btn btn-primary">Save</button>
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
