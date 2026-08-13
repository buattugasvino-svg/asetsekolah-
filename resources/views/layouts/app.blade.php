<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="Sistem Informasi Inventaris Aset Sekolah">

    <title>@yield('title', 'Dashboard') - Inventaris Aset Sekolah</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/css/bootstrap.min.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- AdminHMD --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/css/style.css') }}">
</head>

<body>

<div class="admin-shell">

    {{-- SIDEBAR BACKDROP --}}
    <div class="sidebar-backdrop"
        data-sidebar-close="true"></div>


    {{-- ================= SIDEBAR ================= --}}
    <aside class="admin-sidebar"
        id="adminSidebar"
        aria-label="Main navigation">

        {{-- LOGO --}}
        <div class="sidebar-header">

            <a class="brand-mark"
                href="{{ route('dashboard') }}">

                <span class="brand-icon">
                    <i class="bi bi-box-seam"></i>
                </span>

                <span class="brand-copy">

                    <span class="brand-title">
                        Inventaris
                    </span>

                    <span class="brand-subtitle">
                        Aset Sekolah
                    </span>

                </span>

            </a>

        </div>


        {{-- MENU --}}
        <nav class="sidebar-nav">

            {{-- DASHBOARD --}}
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}">

                <span class="nav-icon">
                    <i class="bi bi-speedometer2"></i>
                </span>

                <span class="nav-text">
                    Dashboard
                </span>

            </a>


            {{-- BARANG --}}
            <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                href="{{ route('barang.index') }}">

                <span class="nav-icon">
                    <i class="bi bi-box-seam"></i>
                </span>

                <span class="nav-text">
                    Barang
                </span>

            </a>


            {{-- KATEGORI --}}
            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                href="{{ route('kategori.index') }}">

                <span class="nav-icon">
                    <i class="bi bi-tags"></i>
                </span>

                <span class="nav-text">
                    Kategori
                </span>

            </a>


            {{-- STOK --}}
            <a class="nav-link {{ request()->routeIs('stok.*') ? 'active' : '' }}"
                href="{{ route('stok.index') }}">

                <span class="nav-icon">
                    <i class="bi bi-stack"></i>
                </span>

                <span class="nav-text">
                    Stok
                </span>

            </a>


            {{-- PENGAJUAN --}}
            <a class="nav-link {{ request()->routeIs('pengajuan.*') ? 'active' : '' }}"
                href="{{ route('pengajuan.index') }}">

                <span class="nav-icon">
                    <i class="bi bi-clipboard-check"></i>
                </span>

                <span class="nav-text">
                    Pengajuan
                </span>

            </a>


            {{-- PENYUSUTAN --}}
            <a class="nav-link {{ request()->routeIs('penyusutan.*') ? 'active' : '' }}"
                href="{{ route('penyusutan.index') }}">

                <span class="nav-icon">
                    <i class="bi bi-graph-down"></i>
                </span>

                <span class="nav-text">
                    Penyusutan
                </span>

            </a>

        </nav>

    </aside>



    {{-- ================= MAIN ================= --}}
    <div class="admin-main">


        {{-- ================= TOPBAR ================= --}}
        <header class="admin-topbar">

            <div class="topbar-left">

                <button type="button"
                    class="btn btn-icon"
                    data-sidebar-toggle
                    aria-label="Toggle sidebar">

                    <i class="bi bi-list"></i>

                </button>


                <div class="topbar-search">

                    <i class="bi bi-search"></i>

                    <input type="text"
                        class="form-control"
                        placeholder="Search...">

                </div>

            </div>


            <div class="topbar-right">

                <button type="button"
                    class="btn btn-icon">

                    <i class="bi bi-bell"></i>

                </button>


                <div class="dropdown">

                    <button class="btn dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle me-1"></i>

                        Admin

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item"
                                href="#">
                                Profile
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <a class="dropdown-item"
                                href="#">

                                Logout

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </header>



        {{-- ================= CONTENT ================= --}}
        <main class="admin-content">

            @yield('content')

        </main>



        {{-- ================= FOOTER ================= --}}
        <footer class="admin-footer">

            <div>
                © {{ date('Y') }} Inventaris Aset Sekolah
            </div>

        </footer>

    </div>

</div>


{{-- Bootstrap JS --}}
<script src="{{ asset('adminhmd/assets/js/bootstrap.bundle.min.js') }}"></script>

{{-- AdminHMD JS --}}
<script src="{{ asset('adminhmd/assets/js/main.js') }}"></script>

</body>

</html>