@extends('admin.layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-primary mb-4">
                        <div class="card-body">11 User</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-primary stretched-link" href="#">View Details</a>
                            <div class="small text-primary"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-warning mb-4">
                        <div class="card-body">20 Pelatihan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-warning stretched-link" href="#">View Details</a>
                            <div class="small text-warning"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-success mb-4">
                        <div class="card-body">20 Pendaftar</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-success stretched-link" href="#">View Details</a>
                            <div class="small text-success"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-danger mb-4">
                        <div class="card-body">30 Sertifikat</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-danger stretched-link" href="#">View Details</a>
                            <div class="small text-danger"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Data Pendaftar Akun User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sertifikatTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data -->
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Admin</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Belum Terverifikasi</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="welcomeModalLabel">Welcome</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Selamat datang admin
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                myModal.show();
            });
        </script>
    @endif
@endsection
