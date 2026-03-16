<div class="sidebar sidebar-default" id="sidebar">

    <!-- ================= HEADER ================= -->
    <div class="sidebar-header text-center py-4 border-bottom border-secondary">
        <div class="mb-2">
            <i class="ri-tablet-line text-white" style="font-size: 32px;"></i>
        </div>
        <h5 class="text-white fw-bold mb-0">SI ASET</h5>
        <small class="text-light">Pustekinfo</small>
    </div>

    <!-- ================= BODY ================= -->
    <div class="sidebar-body p-3">

        <!-- ===== DASHBOARD ===== -->
        <div class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="ri-dashboard-line me-2 fs-18"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- ===== DATA PEGAWAI ===== -->
        <div class="nav-item mb-2">
            <a href="{{ route('pegawai.index') }}"
               class="nav-link d-flex align-items-center {{ request()->routeIs('pegawai.*') ? 'active' : '' }}">
                <i class="ri-user-3-line me-2 fs-18"></i>
                <span>Data Pegawai</span>
            </a>
        </div>

        <!-- ===== DATA ASET ===== -->
        <div class="nav-item mb-2">
            <a href="{{ route('aset.index') }}"
               class="nav-link d-flex align-items-center {{ request()->routeIs('aset.*') ? 'active' : '' }}">
                <i class="ri-tablet-line me-2 fs-18"></i>
                <span>Data Aset</span>
            </a>
        </div>

        <!-- ===== TRANSAKSI ASET ===== -->
        <div class="nav-item mb-2">
            <a href="{{ route('transaksi-aset.index') }}"
               class="nav-link d-flex align-items-center {{ request()->routeIs('transaksi-aset.*') ? 'active' : '' }}">
                <i class="ri-exchange-line me-2 fs-18"></i>
                <span>Transaksi Aset</span>
            </a>
        </div>

        <!-- ===== LAPORAN ===== -->
        <div class="nav-item mb-2">
            <a href="#" class="nav-link d-flex align-items-center">
                <i class="ri-file-chart-line me-2 fs-18"></i>
                <span>Laporan Aset</span>
            </a>
        </div>

    </div>

</div>