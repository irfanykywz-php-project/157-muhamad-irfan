<x-app-layout title="Register">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-person-add"></i>
                            Register
                        </h1>
                    </div>

                    <div class="card-body">

                        <form class="row justify-content-center" action="{{ route('register') }}" method="POST">

                            <div class="col-12 col-md-4">
                                @csrf

                                <div class="mb-3">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                    <span class="form-text text-danger">
                                        {{ $errors->first('name')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Valid Email">
                                    @error('email')
                                    <span class="form-text text-danger">
                                        {{ $errors->first('email')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input class="form-control" type="password" name="password" placeholder="Create a password">
                                    @error('password')
                                    <span class="form-text text-danger">
                                        {{ $errors->first('password')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center">

                                    <!-- Google Recaptcha -->
                                    {!! htmlFormSnippet() !!}

                                    @error('g-recaptcha-response')
                                    <span class="form-text text-danger d-block">
                                        captcha not solved!
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                </div>

                                <x-auth-google/>

                            </div>

                        </form>

                    </div>
                </div>

                <div class="mt-3 text-center">

                    <div class="mb-3">
                        Creating an account means you’re okay with Sfile's
                        <a href="{{ url('p/terms') }}">Terms of Service</a> &
                        <a href="{{ url('p/privacy') }}">Privacy Policy</a>
                    </div>

                    <div class="">
                        Have account?
                        <a class="text-decoration-none" href="{{ route('login') }}">Login!</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        {!! htmlScriptTagJsApi() !!}
    @endpush

</x-app-layout>
