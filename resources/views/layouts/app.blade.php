<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Pengelolaan Aset | Pustekinfo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-dashbyte/dist/assets/img/favicon.png') }}">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin-dashbyte/dist/lib/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashbyte/dist/assets/css/style.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="{{ asset('admin-dashbyte/dist/lib/jquery/jquery.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @livewireStyles

    <style>

        /* ======================================================
           GLOBAL
        ====================================================== */
        body {
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        /* ======================================================
           SIDEBAR (DESKTOP)
        ====================================================== */
        #sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 2000;
            transition: all 0.3s ease;
            border-right: none !important;
        }

        #sidebar.collapsed {
            width: 80px;
        }

        #sidebar.collapsed span,
        #sidebar.collapsed .sidebar-header h5,
        #sidebar.collapsed .sidebar-header small {
            display: none;
        }

        #sidebar.collapsed .nav-link {
            justify-content: center;
        }

        /* ======================================================
           MAIN
        ====================================================== */
        .main {
            margin-left: 260px;
            padding-top: 70px;
            transition: all 0.3s ease;
            background: #f8fafc;
            min-height: 100vh;
            border-left: none !important;
            box-shadow: none !important;
        }

        .main.expanded {
            margin-left: 80px;
        }

        /* ======================================================
           NAVBAR
        ====================================================== */
        .header-main {
            position: fixed;
            top: 0;
            right: 0;
            left: 260px;
            width: calc(100% - 260px);
            transition: all 0.3s ease;
            z-index: 4000;
            border-left: none !important;
        }

        .header-main.expanded {
            left: 80px;
            width: calc(100% - 80px);
        }

        /* ======================================================
           MOBILE
        ====================================================== */
        @media (max-width: 991px) {

            #sidebar {
                position: fixed;
                top: 70px;
                left: 0;
                width: 100%;
                background: #ffffff;
                box-shadow: 0 10px 25px rgba(0,0,0,0.15);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                z-index: 3000;
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }

            #sidebar.show {
                max-height: 600px;
                padding: 15px 0;
            }

            #sidebar .nav-link {
                padding: 12px 20px;
            }

            #sidebar.collapsed span {
                display: inline !important;
            }

            .header-main {
                left: 0 !important;
                width: 100% !important;
            }

            .main {
                margin-left: 0 !important;
            }
        }

        /* ======================================================
           OVERLAY
        ====================================================== */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 2500;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* ======================================================
           CARD
        ====================================================== */
        .card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        }

        /* ======================================================
           DARK MODE
        ====================================================== */
        body.dark-mode {
            background-color: #0f172a !important;
            color: #e2e8f0 !important;
        }

        body.dark-mode .main {
            background-color: #0f172a !important;
        }

        body.dark-mode #sidebar {
            background: #111827 !important;
            border-right: none !important;
        }

        body.dark-mode .header-main {
            background-color: #111827 !important;
            border-bottom: 1px solid #1f2937 !important;
        }

        body.dark-mode .nav-link {
            color: #cbd5e1 !important;
        }

        body.dark-mode .nav-link.active {
            background: rgba(255,255,255,0.08);
        }

        body.dark-mode .card {
            background-color: #1e293b !important;
            color: #e2e8f0 !important;
            box-shadow: 0 6px 18px rgba(0,0,0,0.4);
        }

        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode h5,
        body.dark-mode h6 {
            color: #f1f5f9 !important;
        }

        body.dark-mode .text-muted {
            color: #94a3b8 !important;
        }

        body.dark-mode .table thead {
            background-color: #1f2937 !important;
        }

        /* ======================================================
           LIGHT MODE
        ====================================================== */
        body.light-mode {
            background-color: #eef2f7;
            color: #1e293b;
        }

        body.light-mode .main {
            background-color: #eef2f7;
        }

        body.light-mode #sidebar {
            background: #1e293b;
        }

        body.light-mode .nav-link {
            color: #cbd5e1;
        }

        body.light-mode .nav-link:hover {
            background: rgba(255,255,255,0.08);
        }

        body.light-mode .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
        }

        body.light-mode .header-main {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        body.light-mode .card {
            background-color: #ffffff;
            color: #1e293b;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        body.light-mode .text-muted {
            color: #64748b !important;
        }

        body.light-mode .table thead {
            background-color: #f1f5f9;
        }

        body.light-mode .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
        }

    </style>
</head>

<body class="light-mode">

@include('layouts.header')
@include('layouts.sidebar')

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="main main-app p-3 p-lg-4">
    @yield('content')
    @include('layouts.footer')
</div>

<!-- CORE JS -->
<script src="{{ asset('admin-dashbyte/dist/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const body = document.body;
    const sidebar = document.getElementById("sidebar");
    const menuBtn = document.getElementById("menuSidebar");
    const mainContent = document.querySelector(".main");
    const overlay = document.getElementById("sidebarOverlay");
    const header = document.querySelector(".header-main");

    /* SIDEBAR TOGGLE */
    if (menuBtn && sidebar) {
        menuBtn.addEventListener("click", function () {

            if (window.matchMedia("(max-width: 991px)").matches) {
                sidebar.classList.toggle("show");
                overlay.classList.toggle("show");
            } else {
                sidebar.classList.toggle("collapsed");
                mainContent.classList.toggle("expanded");

                if (header) {
                    header.classList.toggle("expanded");
                }
            }
        });
    }

    /* CLOSE MOBILE OVERLAY */
    if (overlay) {
        overlay.addEventListener("click", function () {
            sidebar.classList.remove("show");
            overlay.classList.remove("show");
        });
    }

    /* DARK / LIGHT MODE */
    document.querySelectorAll("[data-skin]").forEach(btn => {
        btn.addEventListener("click", function () {
            const mode = this.getAttribute("data-skin");
            body.classList.remove("light-mode", "dark-mode");
            body.classList.add(mode + "-mode");
            localStorage.setItem("skin_mode", mode);
        });
    });

    /* ZOOM */
    document.querySelectorAll("[data-zoom]").forEach(btn => {
        btn.addEventListener("click", function () {
            const zoom = this.getAttribute("data-zoom");
            body.style.zoom = zoom + "%";
            localStorage.setItem("zoom_level", zoom);
        });
    });

    /* LOAD SAVED SETTINGS */
    const savedSkin = localStorage.getItem("skin_mode");
    const savedZoom = localStorage.getItem("zoom_level");

    if (savedSkin) {
        body.classList.remove("light-mode", "dark-mode");
        body.classList.add(savedSkin + "-mode");
    }

    if (savedZoom) {
        body.style.zoom = savedZoom + "%";
    }

});
</script>

@livewireScripts
@stack('script')

<script>
function clearSearch() {
    document.getElementById('searchInput').value = '';
}
</script>

<script>
const input = document.getElementById('searchInput');
const clearBtn = document.querySelector('.bi-x-lg').parentElement;

clearBtn.style.display = 'none';

input.addEventListener('input', function () {
    clearBtn.style.display = this.value ? 'flex' : 'none';
});

function clearSearch() {
    input.value = '';
    clearBtn.style.display = 'none';
}
</script>

</body>
</html>