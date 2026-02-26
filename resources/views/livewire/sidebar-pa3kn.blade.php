@if (auth()->user()->role == 'admin')
    @php $role = 'admin' @endphp
@elseif(auth()->user()->role == 'user')
    @php $role = 'user' @endphp
@endif

<div class="nav-group show">
    <a href="#" class="nav-label">Produk Ilmiah</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/analisis-apbn") }}"
                class="nav-link {{ request()->is("$role/pa3kn/analisis-apbn*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Analisis APBN</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/referensi-apbn") }}"
                class="nav-link {{ request()->is("$role/pa3kn/referensi-apbn*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Referensi APBN</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/analisis-ringkas-cepat") }}"
                class="nav-link {{ request()->is("$role/pa3kn/analisis-ringkas-cepat*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Analisis Ringkas Cepat</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/buletin-apbn") }}"
                class="nav-link {{ request()->is("$role/pa3kn/buletin-apbn*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Buletin APBN</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/buku") }}"
                class="nav-link {{ request()->is("$role/pa3kn/buku*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Buku</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/jurnal-budget") }}"
                class="nav-link {{ request()->is("$role/pa3kn/jurnal-budget*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Jurnal Budget</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/infografis") }}"
                class="nav-link {{ request()->is("$role/pa3kn/infografis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Infografis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/videografis") }}"
                class="nav-link {{ request()->is("$role/pa3kn/videografis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Videografis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/data-indikator") }}"
                class="nav-link {{ request()->is("$role/pa3kn/data-indikator*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Data Indikator</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/sekilas-apbn") }}"
                class="nav-link {{ request()->is("$role/pa3kn/sekilas-apbn*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Sekilas APBN</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/analisis-tematik-apbn") }}"
                class="nav-link {{ request()->is("$role/pa3kn/analisis-tematik-apbn*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Analisis Tematik APBN</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/analisis-tematik-akuntabilitas") }}"
                class="nav-link {{ request()->is("$role/pa3kn/analisis-tematik-akuntabilitas*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Analisis Tematik Akuntabilitas</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/kritik-saran") }}"
                class="nav-link {{ request()->is("$role/pa3kn/kritik-saran*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Kritik dan Saran</span></a>
        </li>

    </ul>
</div>


<div class="nav-group show">
    <a href="#" class="nav-label">Sistem Manajemen Mutu</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/dokumen-smm") }}"
                class="nav-link {{ request()->is("$role/pa3kn/dokumen-smm*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Dokumen SMM</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/laporan-kinerja") }}"
                class="nav-link {{ request()->is("$role/pa3kn/laporan-kinerja*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Laporan Kerja</span></a>
        </li>
    </ul>
</div>



<div class="nav-group show">
    <a href="#" class="nav-label">Knowledge Management</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/kategori-tematik") }}"
                class="nav-link {{ request()->is("$role/pa3kn/kategori-tematik*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Kategori Tematik</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/kamus") }}"
                class="nav-link {{ request()->is("$role/pa3kn/kamus*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Kamus</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/peristiwa") }}"
                class="nav-link {{ request()->is("$role/pa3kn/peristiwa*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Peristiwa</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/formula") }}"
                class="nav-link {{ request()->is("$role/pa3kn/formula*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Formula</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/tematik") }}"
                class="nav-link {{ request()->is("$role/pa3kn/tematik*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Tematik</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/pa3kn/peraturan") }}"
                class="nav-link {{ request()->is("$role/pa3kn/peraturan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Peraturan</span></a>
        </li>
    </ul>
</div>
