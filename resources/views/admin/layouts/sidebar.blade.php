<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Core Dashboard -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Akun User Section -->
                <div class="sb-sidenav-menu-heading">Akun User</div>
                <a class="nav-link {{ request()->is('admin/dosen*') ? 'active' : '' }}" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Dosen
                </a>
                <a class="nav-link {{ request()->is('admin/mahasiswa*') ? 'active' : '' }}" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Mahasiswa
                </a>
                <a class="nav-link {{ request()->is('admin/umum*') ? 'active' : '' }}" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Umum
                </a>

                <!-- Akademik Section -->
                <div class="sb-sidenav-menu-heading">Akademik</div>
                <a class="nav-link {{ request()->is('admin/jurusan*') ? 'active' : '' }}" href="{{ route('admin.jurusan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Jurusan
                </a>
                <a class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}" href="{{ route('admin.kelas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                    Kelas
                </a>
                <a class="nav-link {{ request()->is('admin/prodi*') ? 'active' : '' }}" href="{{ route('admin.prodi.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Prodi
                </a>

                <!-- Data Section -->
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link {{ request()->is('admin/lsp*') ? 'active' : '' }}"
                    href="{{ route('admin.lsp.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    LSP
                </a>
                <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}"
                    href="{{ route('admin.sertifikat.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>
                    Sertifikat
                </a>

                <!-- Pelatihan Section -->
                <div class="sb-sidenav-menu-heading">Pelatihan</div>
                <a class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}" href="{{ route('admin.kategori.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    Kategori
                </a>
                <a class="nav-link {{ request()->is('admin/pelatihan*') ? 'active' : '' }}" href="{{ route('admin.pelatihan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    List Pelatihan
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
            <span>{{ Auth::user()->nama }}</span>
        </div>
    </nav>
</div>

<script>
    $(document).ready(function() {
        // Toggle and save collapse state
        $('.collapse').on('shown.bs.collapse', function() {
            var targetId = $(this).attr('id');
            localStorage.setItem(targetId, 'show');
        }).on('hidden.bs.collapse', function() {
            var targetId = $(this).attr('id');
            localStorage.setItem(targetId, 'hide');
        });

        // Restore collapse state
        $('.collapse').each(function() {
            var targetId = $(this).attr('id');
            if (localStorage.getItem(targetId) === 'show') {
                $(this).collapse('show');
            } else {
                $(this).collapse('hide');
            }
        });

        // Close all dropdowns on Dashboard click
        $('.nav-link[href="{{ route('admin.dashboard') }}"]').on('click', function() {
            $('.collapse').collapse('hide');
            $('.collapse').each(function() {
                var targetId = $(this).attr('id');
                localStorage.setItem(targetId, 'hide');
            });
        });
    });
</script>
