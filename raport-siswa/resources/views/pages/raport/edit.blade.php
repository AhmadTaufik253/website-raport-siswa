@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit nilai </h1>
            <p>{{ $item->nama }}</p>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Edit nilai - {{ $item->mapels->nama_pelajaran }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('raport.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id_siswa">Siswa</label>
                        <select name="id_siswa" id="id_siswa" class="form-control" required>
                            <option value="{{ $item->id_siswa }}">{{ $item->siswas->nama }}</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pelajaran">Pilih mata pelajaran</label>
                        <select name="id_pelajaran" id="id_pelajaran" class="form-control" required>
                            <option value="{{ $item->id_pelajaran }}">{{ $item->id_pelajaran }}</option>
                            @foreach ($pelajaran as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" max="100" name="nilai" id="nilai" class="form-control" required
                            value="{{ $item->nilai }}">
                    </div>
                    <button class="btn btn-success" type="submit">Update data siswa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
