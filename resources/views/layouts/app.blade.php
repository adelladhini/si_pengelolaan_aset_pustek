<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Pengelolaan Aset | Pustekinfo</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
          href="{{ asset('admin-dashbyte/dist/assets/img/favicon.png') }}">

    <!-- Vendor CSS -->
    <link rel="stylesheet"
          href="{{ asset('admin-dashbyte/dist/lib/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet"
          href="{{ asset('admin-dashbyte/dist/assets/css/style.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="{{ asset('admin-dashbyte/dist/lib/jquery/jquery.min.js') }}"></script>

    @livewireStyles

    <style>
        body {
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        #sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transition: all 0.3s ease;
            z-index: 2000;
        }

        .main {
            margin-left: 260px;
            transition: all 0.3s ease;
        }

        #sidebar.hide { margin-left: -260px; }
        .main.full { margin-left: 0; }

        /* ================= MOBILE ================= */
        @media (max-width: 991px) {
            #sidebar { left: -260px; }
            #sidebar.show { left: 0; }
            .main { margin-left: 0; }
        }

        /* ================= OVERLAY ================= */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1500;
            display: none;
        }

        .sidebar-overlay.show { display: block; }

        /* ================= SIDEBAR SKIN ================= */
        .sidebar-default { background: #1f2937; }
        .sidebar-prime { background: linear-gradient(180deg, #1e3c72, #2a5298); }
        .sidebar-dark { background: #111827; }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 10px 12px;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
            padding-left: 16px;
        }

        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.15);
            font-weight: 600;
        }

        /* ================= DARK MODE ================= */
        body.dark-mode {
            background-color: #111827;
            color: #f3f4f6;
        }

        body.dark-mode .main { background-color: #111827; }

        body.dark-mode .card,
        body.dark-mode .table,
        body.dark-mode .navbar,
        body.dark-mode .dropdown-menu {
            background-color: #1f2937 !important;
            color: #f3f4f6 !important;
        }

        body.dark-mode .table thead {
            background-color: #374151;
        }

        body.dark-mode .nav-link {
            color: #e5e7eb !important;
        }

        body.dark-mode .header-main {
            background-color: #111827 !important;
            border-bottom: 1px solid #1f2937;
        }

        body.dark-mode .header-main .text-dark,
        body.dark-mode .header-main h6,
        body.dark-mode .header-main i {
            color: #f3f4f6 !important;
        }

        body.dark-mode .dropdown-menu {
            background-color: #1f2937 !important;
            border: 1px solid #374151 !important;
        }

        body.dark-mode .dropdown-item,
        body.dark-mode .list-group-item {
            background-color: transparent !important;
            color: #f3f4f6 !important;
        }

        body.dark-mode .list-group-item:hover {
            background-color: #374151 !important;
        }
    </style>
</head>

<body class="light-mode">

@include('layouts.sidebar')
@include('layouts.header')

<div class="main main-app p-3 p-lg-4">
    @yield('content')
    @include('layouts.footer')
</div>

<!-- CORE JS -->
<script src="{{ asset('admin-dashbyte/dist/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
window.addEventListener("load", function () {

    try {

        const body = document.body;
        const sidebar = document.getElementById("sidebar");
        const menuBtn = document.getElementById("menuSidebar");
        const mainContent = document.querySelector(".main");

        /* ================= SIDEBAR TOGGLE ================= */
        if (menuBtn && sidebar) {
            menuBtn.onclick = function () {

                if (window.innerWidth > 991) {
                    sidebar.classList.toggle("hide");
                    if (mainContent) mainContent.classList.toggle("full");
                } else {
                    sidebar.classList.toggle("show");
                }

            };
        }

        /* ================= SKIN MODE ================= */
        document.querySelectorAll("[data-skin]").forEach(btn => {
            btn.onclick = function () {
                const mode = this.getAttribute("data-skin");

                body.classList.remove("light-mode", "dark-mode");
                body.classList.add(mode + "-mode");

                localStorage.setItem("skin_mode", mode);
            };
        });

        /* ================= SIDEBAR SKIN ================= */
        document.querySelectorAll("[data-sidebar]").forEach(btn => {
            btn.onclick = function () {
                const style = this.getAttribute("data-sidebar");

                if (!sidebar) return;

                sidebar.classList.remove("sidebar-default","sidebar-prime","sidebar-dark");
                sidebar.classList.add("sidebar-" + style);

                localStorage.setItem("sidebar_skin", style);
            };
        });

        /* ================= ZOOM ================= */
        document.querySelectorAll("[data-zoom]").forEach(btn => {
            btn.onclick = function () {
                const zoom = this.getAttribute("data-zoom");
                body.style.zoom = zoom + "%";
                localStorage.setItem("zoom_level", zoom);
            };
        });

        /* ================= LOAD SAVED ================= */
        const savedSkin = localStorage.getItem("skin_mode");
        const savedSidebar = localStorage.getItem("sidebar_skin");
        const savedZoom = localStorage.getItem("zoom_level");

        if (savedSkin) {
            body.classList.add(savedSkin + "-mode");
        }

        if (savedSidebar && sidebar) {
            sidebar.classList.add("sidebar-" + savedSidebar);
        }

        if (savedZoom) {
            body.style.zoom = savedZoom + "%";
        }

    } catch (error) {
        console.error("JS ERROR:", error);
    }

});
</script>

@livewireScripts
@stack('script')

</body>
</html>