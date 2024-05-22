<x-app-layout title="{{ config('app.name') }}">

    <div class="bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">

                    <div class="my-1 py-1 my-sm-5 py-sm-5 text-center">

                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3 row justify-content-center">
                                <div class="col-12 col-sm-6">
                                    <label class="text-white">Select File</label>
                                    <input class="form-control" type="file" name="file">
                                    @error('file')
                                    <small class="text-danger">{{ $errors->first('file')  }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-white">File Description</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
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

</x-app-layout>
