<nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light shadow">

    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3 text-black d-flex align-items-center">
        <img src="{{ asset('/img/16.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        <small class="d-inline-block ms-2 fs-7 text-wrap" style="font-size: 10px;">
            Sistem Informasi Layanan Pelatihan <br> dan Uji Kompetensi
        </small>
    </a>

    <!-- Sidebar Toggle for smaller screens -->
    <button class="d-flex btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Navbar Search for larger screens -->
    <form id="searchForm" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" id="searchInput" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- Navbar profile -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.profile.index') }}">
                <!-- Admin Profile Image -->
                <img src="{{ asset('img/user/admin' . Auth::user()->profile) }}" alt="Profile" width="30" height="30" class="rounded-circle me-2">
                <!-- Admin Name -->
                <span>{{ Auth::user()->nama }}</span>
            </a>
        </li>
    </ul>
</nav>