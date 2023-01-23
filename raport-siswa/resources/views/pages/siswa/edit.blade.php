@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit siswa </h1>
            <p>{{ $item->name }}</p>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Edit siswa - {{ $item->nama }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="number" name="nis" id="nis" class="form-control" required
                            value="{{ $item->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama siswa</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="{{ $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat siswa</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required
                            value="{{ $item->alamat }}">
                    </div>
                    <button class="btn btn-success" type="submit">Update data siswa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
