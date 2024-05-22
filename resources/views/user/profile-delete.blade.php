<x-app-layout title="Edit Profile">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="bg-primary d-flex align-items-center text-white py-2">
                    <div class="px-3">
                        <i class="bi bi-info-circle fs-2"></i>
                    </div>
                    <div>
                        <h1 class="fs-3">
                            Delete My Account Request
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
                        <div class="col-12">
                            <form action="{{ route('user.profile.destroy') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('delete')

                                <div class="mb-3">
                                    <input id="confirm" class="form-check-input" type="checkbox" name="confirm">
                                    <label for="confirm">Are you sure want to delete account ?</label>
                                    @error('confirm')
                                    <span class="form-text text-danger d-block">
                                        {{ $errors->first('confirm')  }}
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-danger">
                                        Delete My Account
                                    </button>
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
    </div>

</x-app-layout>
