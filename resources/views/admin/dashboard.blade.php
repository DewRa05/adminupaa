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
                            <i class="fas fa-users"></i> 11 User
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Verified Users Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <i class="fas fa-check-circle"></i> 2 User Terferifikasi
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">View Details</a>
                            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Additional Cards -->
                @foreach ([['icon' => 'fas fa-times-circle', 'text' => '3 Belum Terverifikasi', 'link' => '#'], ['icon' => 'fas fa-chalkboard-teacher', 'text' => '20 Pelatihan', 'link' => '#'], ['icon' => 'fas fa-clock', 'text' => '3 Menunggu Status Pelatihan', 'link' => '#'], ['icon' => 'fas fa-user-check', 'text' => '20 Pendaftar Diterima', 'link' => '#'], ['icon' => 'fas fa-user-times', 'text' => '20 Pendaftar Ditolak', 'link' => '#'], ['icon' => 'fas fa-certificate', 'text' => '30 Sertifikat', 'link' => '#']] as $card)
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-white text-dark mb-4">
                            <div class="card-body">
                                <i class="{{ $card['icon'] }}"></i> {{ $card['text'] }}
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-dark stretched-link" href="{{ $card['link'] }}">View Details</a>
                                <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Chart Section -->
            <div class="row">
                <!-- Filter Dropdown -->
                <div class="col-12 mb-4">
                    <div class="d-flex justify-content-end">
                        <label for="roleFilter" class="me-2">Filter Role:</label>
                        <select id="roleFilter" class="form-select w-auto">
                            <option value="all" selected>Semua</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="umum">Umum</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>
                </div>

                <!-- Training Participants Chart -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-line me-1"></i> Grafik Peserta Pelatihan
                        </div>
                        <div class="card-body">
                            <canvas id="trainingParticipantsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Users Uploading Certificates Chart -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i> Grafik Pengguna Mengunggah Sertifikat
                        </div>
                        <div class="card-body">
                            <canvas id="usersCertificatesChart"></canvas>
                        </div>
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
                <div class="modal-body">Selamat datang admin</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                myModal.show();
            });
        </script>
    @endif

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dataByRole = {
                all: {
                    participants: [10, 20, 30],
                    certificates: [5, 15, 25]
                },
                mahasiswa: {
                    participants: [5, 10, 15],
                    certificates: [2, 7, 12]
                },
                umum: {
                    participants: [3, 5, 8],
                    certificates: [1, 4, 6]
                },
                dosen: {
                    participants: [2, 5, 7],
                    certificates: [2, 4, 7]
                }
            };

            const trainingParticipantsChartCtx = document.getElementById('trainingParticipantsChart').getContext(
                '2d');
            const usersCertificatesChartCtx = document.getElementById('usersCertificatesChart').getContext('2d');

            const trainingParticipantsChart = new Chart(trainingParticipantsChartCtx, {
                type: 'bar',
                data: {
                    labels: ['Pelatihan 1', 'Pelatihan 2', 'Pelatihan 3'],
                    datasets: [{
                        label: 'Peserta Pelatihan',
                        data: dataByRole['all'].participants,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const usersCertificatesChart = new Chart(usersCertificatesChartCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar'],
                    datasets: [{
                        label: 'Pengguna Mengunggah Sertifikat',
                        data: dataByRole['all'].certificates,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.1
                    }]
                }
            });

            document.getElementById('roleFilter').addEventListener('change', function() {
                const selectedRole = this.value;

                const newData = dataByRole[selectedRole];
                trainingParticipantsChart.data.datasets[0].data = newData.participants;
                trainingParticipantsChart.update();

                usersCertificatesChart.data.datasets[0].data = newData.certificates;
                usersCertificatesChart.update();
            });
        });
    </script>
@endsection
