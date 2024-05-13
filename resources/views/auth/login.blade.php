<x-app-layout title="Login">

    <div class="m-auto">

        <h1 class="fs-3 border-bottom text-center mb-3 pb-3">
            Login
        </h1>

        <form action="/login" method="post">

            @csrf

            @error('invalid')
            {{ $errors->first('invalid')  }}
            @enderror

            <div class="mb-3">
                <label for="">email</label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                @error('email')
                {{ $errors->first('email')  }}
                @enderror
            </div>

            <div class="mb-3">
                <label for="">password</label>
                <input class="form-control" type="text" name="password">
                @error('password')
                {{ $errors->first('password')  }}
                @enderror
            </div>

            <div class="mb-1">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

            <div class="text-end">
                <a href="{{ route('register') }}">Register</a>
            </div>

        </form>

    </div>

</x-app-layout>
