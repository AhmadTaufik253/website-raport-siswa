@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ganti password admin</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Ganti password admin</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updatepass-admin', $item->id) }}">
                    @method('POST')
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password-comfirmation"
                                placeholder="Repeat Password" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                    </div>
                    <p><strong style="color: red">Warning!</strong> Your password will be change after click change
                        password. Leave it blank if you don't want change your password</p>
                    <button type="submit" class="btn btn-block btn-success">
                        Change Password
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
