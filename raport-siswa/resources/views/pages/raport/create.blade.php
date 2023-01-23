@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah nilai siswa</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Nilai siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('raport.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_siswa">Siswa</label>
                        <select name="id_siswa" id="id_siswa" class="form-control" required>
                            <option value="">Pilih siswa</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pelajaran">Pilih mata pelajaran</label>
                        <select name="id_pelajaran" id="id_pelajaran" class="form-control" required>
                            <option value="">Pilih mata pelajaran</option>
                            @foreach ($pelajaran as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" max="100" name="nilai" id="nilai" class="form-control" required>
                    </div>
                    <button class="btn btn-success" type="submit">Simpan mata pelajaran</button>
                </form>
            </div>
        </div>
    </div>
@endsection
