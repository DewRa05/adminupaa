@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- Header -->
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- Dashboard Cards -->
            <div class="row">
                <!-- User Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-users"></i> {{ $userCount }} User
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- User Dosen Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-users"></i> {{ $userDosenCount }} User Dosen
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- User Mahasiswa Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-users"></i> {{ $userMahasiswaCount }} User Mahasiswa
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- User Umum Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-users"></i> {{ $userUmumCount }} User Umum
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Pelatihan Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-chalkboard-teacher"></i> {{ $pelatihanCount }} Pelatihan
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Peserta Menunggu -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-clock"></i> {{ $pendingParticipants }} Peserta menunggu
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Peserta Diterima -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-check"></i> {{ $acceptedParticipants }} Peserta diterima
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Peserta Ditolak -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-times"></i> {{ $rejectedParticipants }} Peserta diitolak
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
