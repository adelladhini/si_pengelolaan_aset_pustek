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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="{{ asset('admin-dashbyte/dist/lib/jquery/jquery.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @livewireStyles

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

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script Delete -->
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Aset?',
        text: "Data tidak bisa dikembalikann!",
        icon: 'warning',

        width: '340px',

        background: '#ffffff',
        color: '#073d5f', // teks utama pakai warna gelap brand

        showCancelButton: true,

        confirmButtonColor: '#067788', // ✅ warna utama
        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',

        customClass: {
            popup: 'swal-custom',
            confirmButton: 'swal-btn-confirm',
            cancelButton: 'swal-btn-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>

<script>
function confirmDeletePegawai(id) {
    Swal.fire({
        title: 'Hapus Pegawai?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',

        width: '340px',

        background: '#ffffff',
        color: '#073d5f',

        showCancelButton: true,

        confirmButtonColor: '#067788',
        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',

        customClass: {
            popup: 'swal-custom',
            confirmButton: 'swal-btn-confirm',
            cancelButton: 'swal-btn-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-pegawai-' + id).submit();
        }
    })
}
</script>

<script>
function confirmDeleteTransaksi(id) {
    Swal.fire({
        title: 'Hapus Transaksi?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',

        width: '340px',

        background: '#ffffff',
        color: '#073d5f',

        showCancelButton: true,

        confirmButtonColor: '#067788',
        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',

        customClass: {
            popup: 'swal-custom',
            confirmButton: 'swal-btn-confirm',
            cancelButton: 'swal-btn-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-transaksi-' + id).submit();
        }
    })
}
</script>

<script>
function confirmDeleteAset(id) {
    Swal.fire({
        title: 'Hapus Aset?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',

        width: '340px',

        background: '#ffffff',
        color: '#073d5f',

        showCancelButton: true,

        confirmButtonColor: '#067788',
        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',

        customClass: {
            popup: 'swal-custom',
            confirmButton: 'swal-btn-confirm',
            cancelButton: 'swal-btn-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-transaksi-' + id).submit();
        }
    })
}
</script>

<script>
function togglePassword(fieldId, btn) {
    let input = document.getElementById(fieldId);
    let icon = btn.querySelector('i');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>

</body>
</html>