<x-app-layout title="Forgot Password">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-key"></i>
                            Forgot Password
                        </h1>
                    </div>

                    <div class="card-body">

                        <form class="row justify-content-center" action="{{ route('password.email') }}" method="POST">

                            <div class="col-12 col-md-4">
                                @csrf

                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com">
                                    @error('email')
                                    <span class="form-text text-danger">{{ $errors->first('email')  }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-primary">Request New Password</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
