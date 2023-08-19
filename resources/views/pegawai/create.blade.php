@extends('dashboard')

@section('main-content')
    <!-- Page Heading -->
    <a href="{{ route('pegawai.index') }}" class="h3 text-secondary"><i class="fa fa-angle-left"></i></a>
    
    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-header">
            <h3 class="m-0">Data Pegawai</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data"
                class="font-weight-bold">
                @include('layouts.form', ['tombol' => 'Tambah'])
            </form>
        </div>
    </div>


    <!-- End of Main Content -->
@endsection
