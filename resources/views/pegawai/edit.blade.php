@extends('dashboard')

@section('main-content')
    <!-- Page Heading -->
    <a href="{{ route('pegawai.index') }}" class="text-secondary"><i class="fa fa-angle-left"></i></a>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-header">
            <h3 class="m-0">Edit Pegawai</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.update', ['id' => $pegawai->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @include('layouts.form', ['tombol' => 'Update'])
            </form>
        </div>
    </div>


    <!-- End of Main Content -->
@endsection
