<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Core dashboars -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Akun User Section -->
                <div class="sb-sidenav-menu-heading">Akun User</div>
                <a class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#user"
                    aria-expanded="false" aria-controls="user">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/user*') ? 'show' : '' }}" id="user"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/dosen*') ? 'active' : '' }}"
                            href="{{ route('admin.dosen.index') }}">Dosen</a>
                        <a class="nav-link {{ request()->is('admin/mahasiswa*') ? 'active' : '' }}"
                            href="{{ route('admin.mahasiswa.index') }}">Mahasiswa</a>
                        <a class="nav-link {{ request()->is('admin/umum*') ? 'active' : '' }}" href="{{ route('admin.umum.index') }}">Umum</a>
                    </nav>
                </div>

                <!-- Akademik Section -->
                <div class="sb-sidenav-menu-heading">Akademik</div>
                <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#akademik" aria-expanded="false"
                    aria-controls="akademik">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Akademik
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="akademik" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/jurusan*') ? 'active' : '' }}"
                            href="{{ route('admin.jurusan.index') }}">Jurusan</a>
                        <a class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}"
                            href="{{ route('admin.kelas.index') }}">Kelas</a>
                        <a class="nav-link {{ request()->is('admin/prodi*') ? 'active' : '' }}"
                            href="{{ route('admin.prodi.index') }}">Prodi</a>
                    </nav>
                </div>

                <!-- Data Section -->
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Grafik
                </a>
                <a class="nav-link {{ request()->is('admin/lsp*') ? 'active' : '' }}"
                    href="{{ route('admin.lsp.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    LSP
                </a>
                <a class="nav-link collapsed {{ request()->is('admin/kategori*') || request()->is('admin/pelatihan*') ? 'show' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#pelatihan" aria-expanded="false"
                    aria-controls="pelatihan">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Pelatihan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/kategori*') || request()->is('admin/pelatihan*') ? 'show' : '' }}"
                    id="pelatihan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}"
                            href="{{ route('admin.kategori.index') }}">Kategori Pelatihan</a>
                        <a class="nav-link {{ request()->is('admin/pelatihan*') ? 'active' : '' }}"
                            href="{{ route('admin.pelatihan.index') }}">List Pelatihan</a>
                    </nav>
                </div>
                <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}" href="{{ route('admin.sertifikat.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>
                    Sertifikat
                </a>

                <!-- Settings Section -->
                <div class="sb-sidenav-menu-heading">Setting</div>
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>

<style>
    /* Sidebar background and box shadow */
    .sb-sidenav {
        background-color: #f0f2f5;
        /* Warna lebih terang untuk tampilan bersih */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #dcdde1;
    }

    /* Sidebar headings */
    .sb-sidenav-menu-heading {
        font-size: 0.85rem;
        color: #555a64;
        /* Warna abu-abu gelap untuk kesan serius */
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 1.5rem;
        padding: 0 15px;
        letter-spacing: 1px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        /* Lebih halus */
    }

    /* Sidebar links */
    .nav-link {
        color: #4a4e57;
        /* Warna abu-abu untuk teks */
        font-size: 0.95rem;
        padding: 12px 20px;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Hover effects on links */
    .nav-link:hover {
        background-color: #dfe4ea;
        /* Warna abu muda untuk hover */
        color: #343a40;
        /* Teks lebih gelap saat hover */
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
    }

    /* Icons for each section */
    .sb-nav-link-icon {
        color: #868e96;
        /* Warna ikon yang lebih redup */
        transition: color 0.3s;
    }

    /* Active and collapsed link styles */
    .nav-link.collapsed .sb-nav-link-icon {
        color: #3498db;
        /* Warna biru saat collapse */
    }

    /* Active link styling */
    .nav-link.active {
        /* Samakan dengan hover */
        background-color: #dfe4ea;
        color: #343a40;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        border-radius: 6px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
    }

    /* Apply same icon color for active state */
    .nav-link.active .sb-nav-link-icon {
        color: #343a40;
        /* Ikon juga menjadi lebih gelap sama seperti hover */
    }

    /* Sidebar collapse arrow */
    .sb-sidenav-collapse-arrow {
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    /* Rotating arrow when expanded */
    .sb-sidenav-collapse-arrow.rotate {
        transform: rotate(180deg);
    }

    /* Styling for sidebar footer */
    .sb-sidenav-footer {
        background-color: #ebeff2;
        /* Footer yang sedikit lebih terang */
        padding: 15px;
        text-align: center;
        font-size: 0.85rem;
        color: #868e96;
        border-top: 1px solid #dcdde1;
        margin-top: auto;
    }

    /* Customize icons' size and color */
    .sb-nav-link-icon i {
        font-size: 1.2rem;
        transition: color 0.3s;
    }

    /* Footer text and small improvements */
    .sb-sidenav-footer .small {
        font-size: 0.75rem;
        font-weight: bold;
        color: #555a64;
    }

    /* General hover and focus states */
    .nav-link:focus,
    .nav-link:hover {
        text-decoration: none;
    }

    /* Smoother animations */
    * {
        scroll-behavior: smooth;
    }

    /* Adding slight shadow to the footer */
    .sb-sidenav-footer {
        box-shadow: inset 0 -1px 2px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    $(document).ready(function() {
        // Save collapse state when a section is opened
        $('.collapse').on('shown.bs.collapse', function() {
            var targetId = $(this).attr('id');
            localStorage.setItem(targetId, 'show');
        });

        // Save collapse state when a section is closed
        $('.collapse').on('hidden.bs.collapse', function() {
            var targetId = $(this).attr('id');
            localStorage.setItem(targetId, 'hide');
        });

        // Restore the collapse state on page load
        $('.collapse').each(function() {
            var targetId = $(this).attr('id');
            if (localStorage.getItem(targetId) === 'show') {
                $(this).addClass('show');
            }
        });

        // Close all dropdowns when 'Dashboard' is clicked
        $('.nav-link[href="{{ route('admin.dashboard') }}"]').on('click', function() {
            $('.collapse').collapse('hide');
        });
    });
</script>

