<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="Sistem Informasi Inventaris Aset Sekolah">

    <title>
        @yield('title', 'Dashboard') - Inventaris Aset Sekolah
    </title>


    {{-- ================= BOOTSTRAP ================= --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/css/bootstrap.min.css') }}">


    {{-- ================= BOOTSTRAP ICONS ================= --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">


    {{-- ================= ADMINHMD CSS ================= --}}
    <link rel="stylesheet"
        href="{{ asset('adminhmd/assets/css/style.css') }}">


    {{-- =====================================================
         SIDEBAR & TOPBAR TOGGLE CSS
    ====================================================== --}}
    <style>

        /* =====================================================
           SIDEBAR
        ====================================================== */

        .admin-sidebar {
            transition:
                width 0.3s ease,
                transform 0.3s ease;

            overflow-x: hidden;
        }


        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .admin-main {
            transition:
                margin-left 0.3s ease,
                width 0.3s ease;
        }


        /* =====================================================
           TOPBAR HEADER (DORONG KE POJOK KANAN)
        ====================================================== */

        .admin-topbar {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 12px 24px;
            width: 100%;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: auto; /* Memastikan grup kanan berada di pojok kanan */
        }

        .topbar-search {
            display: flex;
            align-items: center;
            position: relative;
        }


        /* =====================================================
           DESKTOP
        ====================================================== */

        @media (min-width: 992px) {

            /*
             * Sidebar normal
             */
            .admin-sidebar {
                width: 260px;
            }


            /*
             * Sidebar mengecil
             */
            body.sidebar-collapsed .admin-sidebar {
                width: 80px;
            }


            /*
             * Sembunyikan tulisan logo
             */
            body.sidebar-collapsed .brand-copy {
                display: none;
            }


            /*
             * Sembunyikan tulisan menu
             */
            body.sidebar-collapsed .nav-text {
                display: none;
            }


            /*
             * Icon menjadi di tengah
             */
            body.sidebar-collapsed .brand-mark {
                justify-content: center;
            }


            body.sidebar-collapsed .nav-link {
                justify-content: center;
            }


            body.sidebar-collapsed .nav-icon {
                margin-right: 0;
            }


            /*
             * Main ikut menyesuaikan
             */
            body.sidebar-collapsed .admin-main {
                margin-left: 80px;
            }


            /*
             * Jika normal
             */
            body:not(.sidebar-collapsed) .admin-main {
                margin-left: 260px;
            }


            /*
             * Backdrop tidak diperlukan di desktop
             */
            .sidebar-backdrop {
                display: none !important;
            }

        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 991.98px) {

            /*
             * Sidebar disembunyikan
             */
            .admin-sidebar {
                position: fixed;

                top: 0;
                left: 0;
                bottom: 0;

                width: 260px;

                z-index: 1050;

                transform: translateX(-100%);

                box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
            }


            /*
             * Sidebar muncul
             */
            body.sidebar-open .admin-sidebar {
                transform: translateX(0);
            }


            /*
             * Main tidak mempunyai margin desktop
             */
            .admin-main {
                margin-left: 0 !important;
                width: 100%;
            }


            /*
             * Backdrop
             */
            .sidebar-backdrop {

                position: fixed;

                top: 0;
                left: 0;
                right: 0;
                bottom: 0;

                background: rgba(0, 0, 0, 0.5);

                z-index: 1040;

                display: none;

                cursor: pointer;
            }


            /*
             * Backdrop muncul ketika sidebar dibuka
             */
            body.sidebar-open .sidebar-backdrop {
                display: block;
            }

        }


        /* =====================================================
           MENU
        ====================================================== */

        .sidebar-nav .nav-link {

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                padding 0.3s ease;

        }


        /*
         * Menu aktif
         */
        .sidebar-nav .nav-link.active {

            background-color: #151f33;

            color: #ffffff;

        }


        /*
         * Hover
         */
        .sidebar-nav .nav-link:hover {

            background-color: #151f33;

            color: #ffffff;

        }


        /* =====================================================
           ICON
        ====================================================== */

        .nav-icon {

            min-width: 24px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

        }


        /* =====================================================
           TOGGLE BUTTON
        ====================================================== */

        [data-sidebar-toggle] {

            cursor: pointer;

        }


    </style>

</head>


<body>


<div class="admin-shell">


    {{-- =====================================================
         SIDEBAR BACKDROP
    ====================================================== --}}

    <div class="sidebar-backdrop"
        data-sidebar-close="true">
    </div>



    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="admin-sidebar"
        id="adminSidebar"
        aria-label="Main navigation">


        {{-- ================= LOGO ================= --}}

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



        {{-- =====================================================
             MENU SIDEBAR
        ====================================================== --}}

        <nav class="sidebar-nav">


            {{-- ================= DASHBOARD ================= --}}

            <a class="nav-link
                {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}">

                <span class="nav-icon">

                    <i class="bi bi-speedometer2"></i>

                </span>


                <span class="nav-text">

                    Dashboard

                </span>

            </a>



            {{-- ================= BARANG ================= --}}

            <a class="nav-link
                {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                href="{{ route('barang.index') }}">

                <span class="nav-icon">

                    <i class="bi bi-box-seam"></i>

                </span>


                <span class="nav-text">

                    Barang

                </span>

            </a>



            {{-- ================= KATEGORI ================= --}}

            <a class="nav-link
                {{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                href="{{ route('kategori.index') }}">

                <span class="nav-icon">

                    <i class="bi bi-tags"></i>

                </span>


                <span class="nav-text">

                    Kategori

                </span>

            </a>



            {{-- ================= STOK ================= --}}

            <a class="nav-link
                {{ request()->routeIs('stok.*') ? 'active' : '' }}"
                href="{{ route('stok.index') }}">

                <span class="nav-icon">

                    <i class="bi bi-stack"></i>

                </span>


                <span class="nav-text">

                    Stok

                </span>

            </a>



            {{-- ================= PENGAJUAN ================= --}}

            <a class="nav-link
                {{ request()->routeIs('pengajuan.*') ? 'active' : '' }}"
                href="{{ route('pengajuan.index') }}">

                <span class="nav-icon">

                    <i class="bi bi-clipboard-check"></i>

                </span>


                <span class="nav-text">

                    Pengajuan

                </span>

            </a>



            {{-- ================= PENYUSUTAN ================= --}}

            <a class="nav-link
                {{ request()->routeIs('penyusutan.*') ? 'active' : '' }}"
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



    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <div class="admin-main">


        {{-- =====================================================
             TOPBAR
        ====================================================== --}}

        <header class="admin-topbar">


            <div class="topbar-left">


                {{-- ================= TOGGLE SIDEBAR ================= --}}

                <button type="button"
                    class="btn btn-icon"
                    data-sidebar-toggle
                    aria-label="Toggle sidebar">

                    <i class="bi bi-list"></i>

                </button>



                {{-- ================= SEARCH ================= --}}

                <div class="topbar-search">

                    <i class="bi bi-search"></i>


                    <input type="text"
                        class="form-control"
                        placeholder="Search...">

                </div>

            </div>



            {{-- =====================================================
                 TOPBAR RIGHT
            ====================================================== --}}

            <div class="topbar-right">


                {{-- ================= NOTIFICATION ================= --}}

                <button type="button"
                    class="btn btn-icon">

                    <i class="bi bi-bell"></i>

                </button>



                {{-- ================= USER ================= --}}

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



        {{-- =====================================================
             CONTENT
        ====================================================== --}}

        <main class="admin-content">

            @yield('content')

        </main>



        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <footer class="admin-footer">

            <div>

                © {{ date('Y') }} Inventaris Aset Sekolah

            </div>

        </footer>


    </div>

</div>



{{-- =====================================================
     BOOTSTRAP JS
====================================================== --}}

<script src="{{ asset('adminhmd/assets/js/bootstrap.bundle.min.js') }}">
</script>



{{-- =====================================================
     ADMINHMD JS
====================================================== --}}

<script src="{{ asset('adminhmd/assets/js/main.js') }}">
</script>



{{-- =====================================================
     SIDEBAR TOGGLE JAVASCRIPT
====================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
     * Ambil elemen
     */

    const toggleButton =
        document.querySelector('[data-sidebar-toggle]');


    const backdrop =
        document.querySelector('[data-sidebar-close="true"]');


    /*
     * Kalau tombol tidak ditemukan
     */

    if (!toggleButton) {

        console.log('Tombol sidebar tidak ditemukan');

        return;

    }



    /*
     * ==============================================
     * KLIK TOMBOL HAMBURGER
     * ==============================================
     */

    toggleButton.addEventListener('click', function () {


        /*
         * DESKTOP
         */

        if (window.innerWidth >= 992) {


            document.body.classList.toggle(
                'sidebar-collapsed'
            );


        }


        /*
         * MOBILE
         */

        else {


            document.body.classList.toggle(
                'sidebar-open'
            );


        }

    });



    /*
     * ==============================================
     * KLIK BACKDROP
     * ==============================================
     */

    if (backdrop) {


        backdrop.addEventListener('click', function () {


            document.body.classList.remove(
                'sidebar-open'
            );


        });


    }



    /*
     * ==============================================
     * TEKAN ESC
     * ==============================================
     */

    document.addEventListener('keydown', function (event) {


        if (event.key === 'Escape') {


            document.body.classList.remove(
                'sidebar-open'
            );


        }

    });



    /*
     * ==============================================
     * JIKA RESIZE DARI MOBILE KE DESKTOP
     * ==============================================
     */

    window.addEventListener('resize', function () {


        if (window.innerWidth >= 992) {


            document.body.classList.remove(
                'sidebar-open'
            );


        }

    });


});

</script>


</body>

</html>
