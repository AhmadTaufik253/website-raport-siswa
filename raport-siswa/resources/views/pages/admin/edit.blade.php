@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit admin</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Edit admin - {{ $item->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            value="{{ $item->name }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            value="{{ $item->email }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" required class="form-control">
                            <option value="{{ $item->level }}">{{ $item->level }}</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
