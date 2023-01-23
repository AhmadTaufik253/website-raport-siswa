@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Tambah admin</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nis" class="col-form-label text-md-end">{{ __('NIP') }}</label>
                        <input id="nis" type="numeric" class="form-control @error('nis') is-invalid @enderror"
                            name="nis" value="{{ old('nis') }}" required autocomplete="nis" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password-confirm"
                            class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>


                    <div class="form-group">
                        <label for="alamat" class="col-form-label text-md-end">{{ __('Alamat') }}</label>
                        <input id="text" type="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" required autocomplete="new-alamat">

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="text" name="level" id="level" value="admin" hidden>
                    <button type="submit" class="btn btn-success btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
