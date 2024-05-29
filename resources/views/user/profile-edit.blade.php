<x-app-layout title="Edit Profile" turbofresh="true">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="bg-primary d-flex align-items-center text-white py-2">
                    <div class="px-3">
                        <i class="bi bi-person fs-2"></i>
                    </div>
                    <div>
                        <h1 class="fs-3">
                            My Account
                        </h1>
                    </div>
                </div>

                <div class="card my-3">

                    <div class="card-header rounded-0 bg-primary">
                    </div>

                    @if(session('message'))
                        <div class="alert alert-success rounded-0">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger rounded-0">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-body row justify-content-center text-center">
                        <div class="col-12 col-md-4">
                            <form action="{{ route('user.profile.update') }}" method="POST" data-turbo="false">
                                @csrf

                                @method('put')

                                <div>
                                    <h2 class="fs-5 fw-normal">
                                        Profile Account Detail
                                    </h2>
                                </div>

                                <div class="my-3">
                                    <div>
                                        <img referrerpolicy="no-referrer" class="rounded" width="75" src="{{ auth()->user()->photoUrl(auth()->user()->photo) }}" alt="profile">
                                    </div>
                                    <a class="btn btn-secondary my-1" href="javascript:;"
                                       data-bs-toggle="modal" data-bs-target="#photoModal"
                                    >Change Picture</a>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2">User Name</label>
                                    <input class="form-control form-control-sm" type="text" name="name" value="{{ auth()->user()->name }}">
                                    @error('name')
                                    <span class="form-text text-danger">
                                        {{ $errors->first('name')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input disabled class="form-control form-control-sm" type="email" name="email" value="{{ auth()->user()->email }}">
                                </div>

                                <div class="mb-3">
                                    <input class="form-control form-control-sm" type="password" name="password" value="" placeholder="insert password to save settings">
                                    @error('password')
                                    <span class="form-text text-danger">
                                        {{ $errors->first('password')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <button class="btn btn-secondary">Save settings</button>
                                </div>

                                <div>
                                    <a class="text-decoration-none text-danger small" href="{{ route('user.profile.delete') }}">Delete My Account</a>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('user.profile-edit-photo')

    @push('scripts')
        @vite([
            'resources/css/user/profile.css',
            'resources/js/user/profile.js',
        ])
    @endpush

</x-app-layout>
