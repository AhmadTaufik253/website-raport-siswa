@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah siswa</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Data siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="number" name="nis" id="nis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama siswa</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat siswa</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" required
                            value="123456789" hidden>
                    </div>
                    <button class="btn btn-success" type="submit">Simpan data siswa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
