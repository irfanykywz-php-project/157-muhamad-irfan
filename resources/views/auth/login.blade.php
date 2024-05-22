<x-app-layout title="Login">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </h1>
                    </div>

                    <div class="card-body">

                        <form class="row justify-content-center" action="{{ route('login') }}" method="POST">

                           <div class="col-12 col-md-4">
                               @csrf

                               @error('invalid')
                               <div class="alert alert-danger">
                                   {{ $errors->first('invalid')  }}
                               </div>
                               @enderror

                               @if(session('message'))
                               <div class="alert alert-success">
                                   {{ session('message') }}
                               </div>
                               @endif

                               @if(session('delete'))
                                   <div class="alert alert-danger">
                                       {{ session('delete') }}
                                   </div>
                               @endif

                               <div class="mb-3">
                                   <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                   @error('email')
                                   <span class="form-text text-danger">{{ $errors->first('email')  }}</span>
                                   @enderror
                               </div>

                               <div class="mb-3">
                                   <input class="form-control" type="password" name="password" placeholder="password">
                                   @error('password')
                                   <span class="form-text text-danger">{{ $errors->first('password')  }}</span>
                                   @enderror
                               </div>

                               <div class="mb-3 text-center">
                                   <input class="form-check-input" type="checkbox" name="remember" id="remember" value="true">
                                   <label for="remember">
                                       Remember Me
                                   </label>
                               </div>

                               <div class="mb-1">
                                   <button class="btn btn-primary w-100" type="submit">Login</button>
                               </div>

                               <div class="my-3 text-center">
                                   OR
                               </div>

                               <div>
                                   <img src="{{ asset('assets/Google-login-btn-r7.svg') }}" alt="google">
                               </div>

                           </div>

                        </form>

                    </div>
                </div>

                <div class="mt-3 text-center">

                    <div class="mb-3">
                        <a class="text-decoration-none" href="{{ route('forgot') }}">Forgot Passwords?</a>
                    </div>

                    <div class="">
                        No account?
                        <a class="text-decoration-none" href="{{ route('register') }}">Register!</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
