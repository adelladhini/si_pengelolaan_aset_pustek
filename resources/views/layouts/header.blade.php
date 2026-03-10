<div class="header-main d-flex align-items-center justify-content-between px-3 px-lg-4 shadow-sm bg-white">

    <!-- ================= LEFT AREA ================= -->
    <div class="d-flex align-items-center">

        <!-- HAMBURGER -->
        <button id="menuSidebar"
                type="button"
                class="btn btn-link p-0 me-3 border-0 text-dark"
                style="box-shadow:none;">
            <i class="ri-menu-2-fill fs-20"></i>
        </button>

        <!-- TITLE DESKTOP -->
        <h6 class="mb-0 fw-bold d-none d-sm-block">
            Sistem Informasi Pengelolaan Aset
        </h6>

        <!-- TITLE MOBILE -->
        <h6 class="mb-0 fw-bold d-sm-none">
            SI ASET
        </h6>
    </div>


    <!-- ================= RIGHT AREA ================= -->
    <div class="d-flex align-items-center gap-3">

        <!-- ================= SETTINGS ================= -->
        <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown" class="text-dark">
                <i class="ri-settings-3-line fs-20"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-end p-3 shadow" style="width:260px">

                <!-- SKIN MODE -->
                <label class="fw-semibold small">Skin Mode</label>
                <div class="d-flex gap-2 mt-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100" data-skin="light">
                        Light
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100" data-skin="dark">
                        Dark
                    </button>
                </div>

                <hr>

                <!-- ZOOM -->
                <label class="fw-semibold small">Ukuran Website</label>
                <div class="d-flex gap-2 mt-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100" data-zoom="80">
                        Kecil
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100" data-zoom="90">
                        Sedang
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100" data-zoom="100">
                        Besar
                    </button>
                </div>

            </div>
        </div>


        <!-- ================= PROFILE ================= -->
        <div class="dropdown">

            <a href="#" data-bs-toggle="dropdown">
                <div class="avatar online">
                    @if (session('informal_photo_name'))
                        <img src="https://berkas.dpr.go.id/portal/photos/{{ session('informal_photo_name') }}" 
                             alt="Foto Profil">
                    @else
                        <img src="{{ asset('admin-dashbyte/dist/assets/img/user.png') }}" 
                             alt="Foto Profil">
                    @endif
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end shadow" style="width:260px;">

                <!-- PROFILE HEADER -->
                <div class="p-3 text-center border-bottom">

                    <div class="mb-2">
                        @if (session('informal_photo_name'))
                            <img src="https://berkas.dpr.go.id/portal/photos/{{ session('informal_photo_name') }}"
                                 class="rounded-circle" width="60">
                        @else
                            <img src="{{ asset('admin-dashbyte/dist/assets/img/user.png') }}"
                                 class="rounded-circle" width="60">
                        @endif
                    </div>

                    <h6 class="mb-0 fw-semibold">
                        {{ session('nama') ?? 'User' }}
                    </h6>
                    <small class="text-muted">
                        Administrator
                    </small>
                </div>

                <!-- MENU -->
                <div class="list-group list-group-flush">

                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="ri-question-line me-2"></i>
                        Pusat Bantuan
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="ri-lock-line me-2"></i>
                        Pengaturan Privasi
                    </a>

                    <a href="{{ route('pengaturan.akun') }}" 
                    class="list-group-item list-group-item-action">
                        <i class="ri-user-settings-line me-2"></i>
                        Pengaturan Akun
                    </a>
                    
                    <div class="dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="list-group-item list-group-item-action text-danger border-0 bg-transparent text-start w-100">
                            <i class="ri-logout-box-r-line me-2"></i>
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>