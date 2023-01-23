<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://smpn16tangsel.sch.id/">
        <div class="sidebar-brand-icon">
            <i class="bi bi-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            @if (Auth::user()->level == 'admin')
                SMPN 16 Tangsel
            @else
                SMPN 16 Tangsel
            @endif
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->level == 'admin')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="bi bi-key"></i>
                <span>Admin</span></a>
        </li>

        <!-- Nav Item - pelajaran -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('changepass-admin', Auth::user()->id) }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Update password</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data center
        </div>

        <!-- Nav Item - siswa -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('siswa.index') }}">
                <i class="bi bi-people"></i>
                <span>Siswa</span></a>
        </li>

        <!-- Nav Item - pelajaran -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('matapelajaran.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Mata pelajaran</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('raport.index') }}">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span>Raport</span></a>
        </li>
    @endif

    @if (Auth::user()->level == 'user')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Siswa center
        </div>

        <!-- Nav Item - siswa -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - pelajaran -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('changepass', Auth::user()->id) }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Update password</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('raport-siswa', Auth::user()->id) }}">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span>Raport</span></a>
        </li>
    @endif

    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="nav-link">
            @csrf
            <button class="btn nav-link" type="submit" style="margin-left: -18px; margin-top:-21px"><i
                    class="bi bi-door-open"></i><span>Logout</span></button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
