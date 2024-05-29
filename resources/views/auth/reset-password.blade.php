<x-app-layout title="Reset Password">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card rounded-0 mb-3">
                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="fs-3 text-white">
                            <i class="bi bi-key"></i>
                            Reset Password
                        </h1>
                    </div>

                    <div class="card-body">

                        <form class="row justify-content-center" action="{{ route('password.update') }}" method="POST">

                            <div class="col-12 col-md-4">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

{{--                                @foreach($errors->all() as $error)--}}
{{--                                    {{ $error }}--}}
{{--                                @endforeach--}}


                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $email }}" readonly>
                                    @error('email')
                                    <span class="form-text text-danger">{{ $errors->first('email')  }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">New Password</label>
                                    <input class="form-control" type="text" name="password" placeholder="">
                                    @error('password')
                                    <span class="form-text text-danger">{{ $errors->first('password')  }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Confirm New Password</label>
                                    <input class="form-control" type="text" name="password_confirmation" placeholder="">
                                    @error('password_confirmation')
                                    <span class="form-text text-danger">{{ $errors->first('password_confirmation')  }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-primary">Reset Password</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
