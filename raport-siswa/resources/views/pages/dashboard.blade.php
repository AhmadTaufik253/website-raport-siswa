@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="card p-3">
            <div class="card-heading">
                <strong>Welcome! {{ Auth::user()->name }}. </strong>
            </div>
            <div class="card-body">

                <p>Selamat datang di web E-Raport SMPN 16 Tangerang Selatan.
                </p>
            </div>
        </div>
    </div>
@endsection
