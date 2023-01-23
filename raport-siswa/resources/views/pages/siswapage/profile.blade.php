@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile siswa</h1>
        </div>

        <div class="card">
            <div class="card-heading ml-4 mt-4">
                <h6>Data siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NIS</th>
                                <td>{{ Auth::user()->nis }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ Auth::user()->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
