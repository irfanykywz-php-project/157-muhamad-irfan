<x-app-layout title="Register">

    <div class="m-auto">

        <h1 class="fs-3 border-bottom text-center mb-3 pb-3">
            Register
        </h1>

        <form action="/register" method="post">

            @csrf

            <div class="mb-3">
                <label for="">name</label>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="mb-3">
                <label for="">email</label>
                <input class="form-control" type="text" name="email">
            </div>

            <div class="mb-3">
                <label for="">password</label>
                <input class="form-control" type="text" name="password">
            </div>

            <div class="mb-1">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

            <div class="text-end">
                <a href="{{ route('login') }}">Login</a>
            </div>

        </form>

    </div>

</x-app-layout>
