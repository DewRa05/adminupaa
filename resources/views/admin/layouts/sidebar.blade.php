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
                            href="#">Dosen</a>
                        <a class="nav-link {{ request()->is('admin/mahasiswa*') ? 'active' : '' }}"
                            href="#">Mahasiswa</a>
                        <a class="nav-link {{ request()->is('admin/umum*') ? 'active' : '' }}" href="#">Umum</a>
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
                            href="#">Jurusan</a>
                        <a class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}"
                            href="#">Kelas</a>
                        <a class="nav-link {{ request()->is('admin/prodi*') ? 'active' : '' }}"
                            href="#">Prodi</a>
                    </nav>
                </div>

                <!-- Data Section -->
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Grafik
                </a>
                <a class="nav-link {{ request()->is('admin/lsp*') ? 'active' : '' }}"
                    href="#">
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
                            href="#">Kategori Pelatihan</a>
                        <a class="nav-link {{ request()->is('admin/pelatihan*') ? 'active' : '' }}"
                            href="#">List Pelatihan</a>
                    </nav>
                </div>
                <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}" href="#">
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



