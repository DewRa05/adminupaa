@extends('admin.layouts.app')

@section('title', 'Detail Pelatihan')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Pelatihan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pelatihan.index') }}" class="text-decoration-none">Pelatihan</a></li>
            <li class="breadcrumb-item">Detail</li>
        </ol>

        <div class="card mb-4 shadow" style="border-radius: 8px; overflow: hidden;">
            <div class="card-header bg-secondary text-white d-flex align-items-center">
                <i class="fas fa-info-circle me-2"></i>
                <span>Detail Pelatihan</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Left side: Image -->
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <img src="{{ asset('img/pelatihan/' . $pelatihan->gambar) }}" alt="Gambar Pelatihan" class="img-fluid" style="max-height: 400px; object-fit: cover; border-radius: 8px;">
                    </div>

                    <!-- Right side: Training details -->
                    <div class="col-md-6">
                        <h3 class="mb-2" style="font-size: 1.75rem; color: #343a40;"><strong>{{ $pelatihan->nama }}</strong></h3>
                        <p class="mb-2"><strong>LSP:</strong> {{ $pelatihan->lsp->nama }}</p>

                        <div class="d-flex mb-3">
                            <p class="me-4"><strong>Jenis Pelatihan:</strong> {{ $pelatihan->jenis_pelatihan }}</p>
                        </div>

                        <div class="d-flex mb-1">
                            <p class="me-2"><strong>Kategori:</strong> {{ $pelatihan->kategori->nama }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1"><strong>Deskripsi:</strong></p>
                            <p id="desc-preview">
                                {{ \Illuminate\Support\Str::limit($pelatihan->deskripsi, 200) }}
                                @if (strlen($pelatihan->deskripsi) > 200)
                                    <a href="javascript:void(0);" id="toggleDesc" class="btn btn-sm btn-primary">Read More</a>
                                @endif
                            </p>
                            <p id="desc-full" style="display: none;">
                                {{ $pelatihan->deskripsi }}
                                <a href="javascript:void(0);" id="toggleLess" class="btn btn-sm btn-primary">Show Less</a>
                            </p>
                        </div>

                        <div class="mb-3">
                            <p style="font-size: 1.2rem; color: #28a745;"><strong>Harga:</strong> Rp. {{ number_format($pelatihan->harga, 0, ',', '.') }}</p>
                        </div>

                        <div class="d-flex mb-3">
                            <p class="me-4"><strong>Kuota:</strong> {{ $pelatihan->kuota }}</p>
                        </div>

                        <div class="d-flex mb-3">
                            <p><strong>Periode Pendaftaran:</strong> {{ \Carbon\Carbon::parse($pelatihan->tanggal_pendaftaran)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($pelatihan->berakhir_pendaftaran)->format('d/m/Y') }}</p>
                        </div>

                        <button id="loadParticipants" class="btn btn-primary mt-2" style="background-color: #007bff; border: none; border-radius: 5px;">Lihat Peserta</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4" id="participantsCard" style="display:none;">
            <div class="card-header">
                <i class="fas fa-users me-1"></i> Peserta Pelatihan
            </div>
            <div class="card-body">
                <div id="spinner" style="display:none;" class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="user" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Pelatihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.pelatihan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
</main>

@endsection

@section('styles')
<style>
    .detail-grid p {
        display: flex;
        justify-content: space-between;
    }
    .detail-grid span:first-child {
        min-width: 150px;
        font-weight: bold;
        color: #495057;
    }
</style>
@endsection

@section('scripts')
@push('script')
<script>
    $(document).ready(function() {
        $('#toggleDesc').click(function(e) {
            e.preventDefault();
            $('#desc-preview').hide();
            $('#desc-full').show();
        });

        $('#toggleLess').click(function(e) {
            e.preventDefault();
            $('#desc-full').hide();
            $('#desc-preview').show();
        });

        $(document).ajaxStart(function() {
            $('#spinner').show();
        }).ajaxStop(function() {
            $('#spinner').hide();
        });

        let table;
        $('#loadParticipants').click(function() {
            const pelatihanId = {{ $pelatihan->id }};

            if ($.fn.dataTable.isDataTable('#user')) {
                table.ajax.reload(null, false);
            } else {
                table = $('#user').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('admin.pelatihan.participants', $pelatihan->id) }}',
                        type: 'GET',
                    },
                    columns: [
                        { data: 'user.nama', name: 'user.nama' },
                        { data: 'pelatihan.nama', name: 'pelatihan.nama' },
                        { data: 'status_pendaftaran', name: 'status_pendaftaran',
                        }
                    ]
                });
            }
            $('#participantsCard').show();
        });
    });
</script>
@endpush
@endsection
