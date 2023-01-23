@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Raport Siswa</h1>
            @if (Auth::user()->level == 'admin')
                <a href="{{ route('raport.create') }}" class="ml-auto"><button class="btn btn-success">Tambah
                        data nilai</button></a>
            @endif
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h5>{{ $item->name }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Mata pelajaran</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                @if (Auth::user()->level == 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->mapels->nama_pelajaran }}</td>
                                    <td>{{ $item->nilai }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    @if (Auth::user()->level == 'admin')
                                        <td class="d-flex">
                                            <a href="{{ route('raport.edit', $item->id) }}" class="mr-2"><button
                                                    class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>
                                            <form action="{{ route('raport.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="mr-2" type="submit"><button
                                                        class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <th>Nilai total</th>
                                <th colspan="3">{{ $totalNilai }}</th>
                            </tr>
                            <tr>
                                <th>Nilai rata-rata</th>
                                <th colspan="3">{{ $mean }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
