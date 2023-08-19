@extends('dashboard')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pegawai
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $jumlahPegawai }}</div>
                            <a href="{{ route('pegawai.index') }}" class="text-secondary pb-0" style="text-decoration: none" >Selengkapnya</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Bezzeting</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Struktur Organisasi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 order-lg-2">
            <div class="card shadow mb-4 px-3">
                <div class="card-profile-image py-4">
                    <img src="{{ asset('img/logo-diskominfo.png') }}" alt="" class="rounded">
                </div>
                <div class="card-footer h5 text-center text-muted text-primary font-weight-bold">Dinas Komunikasi dan Informatika Kabupaten Klaten</div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary">Informasi Dinas</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped font-weight-bold">
                        <tr>
                            <td><i class="fa fa-user-plus"></i></td>
                            <td>Nama Dinas</td>
                            <td>:</td>
                            <td>Diskominfo Kabupaten Klaten </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker"></i></td>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>Jl. Pemuda Nomor No. 294, Dusun 1, Tegalyoso, Kec. Klaten Sel., Kabupaten Klaten, Jawa Tengah 57413 </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-globe"></td>
                            <td>Website</td>
                            <td>:</td>
                            <td><a href="https://diskominfo.klaten.go.id/">https://diskominfo.klaten.go.id/</a></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-phone"></i></td>
                            <td>No. Telp</td>
                            <td>:</td>
                            <td>0272-321046</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
