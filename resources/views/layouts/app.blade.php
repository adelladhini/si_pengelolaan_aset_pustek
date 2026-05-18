<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Pengelolaan Aset | Pustekinfo </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-dashbyte/dist/assets/img/favicon.png') }}">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin-dashbyte/dist/lib/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashbyte/dist/assets/css/style.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @livewireStyles
</head>

    <body class="light-mode">

    @include('layouts.header')
    @include('layouts.sidebar')

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="main main-app pt-2 px-3 px-lg-4">
        @yield('content')
        @include('layouts.footer')
    </div>

    <!-- CORE JS -->
    <script src="{{ asset('admin-dashbyte/dist/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const menuBtn = document.getElementById("menuSidebar");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");
    const mainContent = document.querySelector(".main");
    const header = document.querySelector(".header-main");

    if (!menuBtn || !sidebar) {
        console.error("Sidebar element tidak ditemukan!");
        return;
    }

    menuBtn.addEventListener("click", function () {

        // 🔥 Cek dari CSS, bukan JS width
        if (window.matchMedia("(max-width: 991px)").matches) {

            sidebar.classList.toggle("show");

            if (overlay) {
                overlay.classList.toggle("show");
            }

        } else {

            sidebar.classList.toggle("collapsed");

            if (mainContent) {
                mainContent.classList.toggle("expanded");
            }

            if (header) {
                header.classList.toggle("expanded");
            }

        }

    });

    // CLOSE MOBILE
    if (overlay) {
        overlay.addEventListener("click", function () {
            sidebar.classList.remove("show");
            overlay.classList.remove("show");
        });
    }

});
</script>

    <!-- ================= SEARCH ================= -->
    <script>
    function clearSearch() {
        document.getElementById('searchInput').value = '';
    }

    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById('searchInput');
        const clearBtn = document.querySelector('.bi-x-lg')?.parentElement;

        if (!input || !clearBtn) return;

        clearBtn.style.display = 'none';

        input.addEventListener('input', function () {
            clearBtn.style.display = this.value ? 'flex' : 'none';
        });

        window.clearSearch = function () {
            input.value = '';
            clearBtn.style.display = 'none';
        };
    });
    </script>

    <!-- ================= SWEET ALERT ================= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function confirmDelete(type, id) {

        let titleMap = {
            aset: 'Hapus Aset?',
            pegawai: 'Hapus Pegawai?',
            transaksi: 'Hapus Transaksi?'
        };

        let formPrefix = {
            aset: 'delete-form-aset-',
            pegawai: 'delete-form-pegawai-',
            transaksi: 'delete-form-transaksi-'
        };

        Swal.fire({
            title: titleMap[type],
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            width: '340px',
            background: '#ffffff',
            color: '#073d5f',
            showCancelButton: true,
            confirmButtonColor: '#067788',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formPrefix[type] + id).submit();
            }
        });
    }
    </script>

    <!-- ================= TOGGLE PASSWORD ================= -->
    <script>
    function togglePassword(fieldId, btn) {
        let input = document.getElementById(fieldId);
        let icon = btn.querySelector('i');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
    </script>

    </body>
    </html>