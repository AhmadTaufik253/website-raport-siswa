@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Mata Pelajaran</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Mata pelajaran</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('matapelajaran.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pelajaran">Nama pelajaran</label>
                        <input type="text" name="nama_pelajaran" id="nama_pelajaran" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="akm">AKM</label>
                        <input type="number" max="100" name="akm" id="akm" class="form-control" required>
                    </div>
                    <button class="btn btn-success" type="submit">Simpan mata pelajaran</button>
                </form>
            </div>
        </div>
    </div>
@endsection
