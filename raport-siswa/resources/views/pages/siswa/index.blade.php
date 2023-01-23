@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data siswa SMPN 16 Tangerang Selatan</h1>
            @if (Auth::user()->level == 'admin')
                <a href="{{ route('siswa.create') }}" class="ml-auto"><button class="btn btn-success">Tambah
                        siswa</button></a>
            @endif
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Data siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama siswa</th>
                                <th>Alamat</th>
                                @if (Auth::user()->level == 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Str::limit($item->alamat, 30, '...') }}</td>
                                    @if (Auth::user()->level == 'admin')
                                        <td class="d-flex">
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="mr-2"><button
                                                    class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>
                                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="mr-2" type="submit"><button
                                                        class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
