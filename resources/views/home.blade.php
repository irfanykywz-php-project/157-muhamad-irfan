<x-app-layout title="{{ config('app.name') }}" turbofresh="{{ auth()->check() ? 'true' : 'false' }}" >

    <div class="bg-primary">
        <div class="container">
            @if(auth()->check())
                <div class="row justify-content-center" id="formUpload">

                    <div class="col-12 col-sm-7 text-center">

                        <div id="dropTarget" class="m-3 p-3 border border-white" style="border-style: dashed !important;">

                            <div class="mb-3">
                                <button id="browseButton" class="btn btn-primary border border-white mb-3">
                                    Browse Files
                                </button>

                                <div id="fileInfo" class="text-white">
                                    or drag and drop files here
                                </div>

                                <div class="progress bg-secondary my-3">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated text-bg-light" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="text-white">Description:</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="mb-3">
                            <p class="text-white my-3">
                                By uploading files, you agree to the
                                <a class="text-decoration-none text-white fw-bold" href="{{ route('pages', 'terms') }}">TOS</a>
                            </p>
                            <button id="pauseOrResumeButton" class="btn btn-md text-white rounded-1 border border-white" type="button">
                                Pause
                            </button>
                            <button id="uploadButton" class="btn btn-md text-white rounded-1" type="button" style="background: #3f51b5">
                                Upload Files
                            </button>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center d-none" id="uploadResult">
                    <div class="col-12 col-sm-5 text-center">
                        <div class="my-5">
                            <div class="alert alert-success">
                                File has been Uploaded successfully!
                            </div>
                            <div class="my-3">
                                <a class="btn btn-primary border-white file-link" href="about:blank">View File</a>
                                <a class="btn btn-primary border-white" href="{{ route('home') }}">Upload More</a>
                            </div>
                            <label class="text-white">Share File:</label>
                            <input onclick="select()" class="form-control" type="text" name="url" readonly>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6">
                        <div class="my-1 py-1 my-sm-5 py-sm-5 text-center">
                            <form action="{{ route('upload.guest') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3 row justify-content-center">
                                    <div class="col-12 col-sm-6">
                                        <label class="text-white">Guest Upload 100MB Limit</label>
                                        <input class="form-control rounded-0" type="file" name="file">
                                        @error('file')
                                        <small class="text-warning">{{ $errors->first('file')  }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="text-white">File Description</label>
                                    <textarea class="form-control rounded-0" name="description" rows="3"></textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $errors->first('description')  }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="text-white my-3">
                                        By uploading files, you agree to the TOS
                                    </label>
                                    <button class="btn btn-md text-white rounded-1 w-50" type="submit" style="background: #3f51b5">
                                        Upload File
                                    </button>
                                    <div id="progress-bar" class="mt-3">
                                        <progress id="progressBar" value="0" max="100" style=" width:250px; height: 15px; border-radius: 2px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;">
                                        </progress>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-4">
                    <form class="my-5" action="{{ route('search') }}" method="GET">
                        <p class="fs-5">
                            Search Files
                        </p>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="q">
                        </div>
                        <button class="btn btn-secondary">
                            <i class="bi bi-search"></i> Search
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="my-md-5 my-3 py-md-5 py-3">
                        <h3 class="mb-3">
                            Upload any file type
                        </h3>
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <p class="mb-0">
                                    Upload all the files on your mobile and desktop, and there is no limit on our free file-sharing platform. The only limitations we impose are a maximum file size of 100MB and 5GB of storage for registered users.
                                    You are in complete control of your files, which is one of the reasons why Sfile.mobi is the most popular file-sharing site in Indonesia today.
                                </p>
                            </div>
                            <div>
                                <i class="bi bi-files h1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="my-md-5 my-3 py-md-5 py-3">
                        <h3 class="mb-3">
                            Share files for free. Anywhere in the world
                        </h3>
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="bi bi-globe h1"></i>
                            </div>
                            <div>
                                <p class="mb-0">
                                    Share any document, photo, or file you want to share with your friends worldwide, anytime and anywhere. We are always ready to be your file-sharing platform 24 hours a day.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="my-md-5 my-3 py-md-5 py-3">
                        <h3 class="mb-3">
                            No pop ups, no malware
                        </h3>
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <p class="mb-0">
                                    Annoyed by pop-up ads, push notifications, or malware? Yeah, we don't like it either. No pop-up ads or push notifications on our site annoy you while sharing files, and no malware infects your smartphones and laptops.
                                </p>
                            </div>
                            <div>
                                <i class="bi bi-shield-fill h1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check())
        @push('scripts')
            @vite([
                'resources/js/upload.js',
                'resources/js/upload-guest.js',
            ])
        @endpush
    @endif

</x-app-layout>
