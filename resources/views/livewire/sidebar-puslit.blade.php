@if (auth()->user()->role == 'admin')
    @php $role = 'admin' @endphp
@elseif(auth()->user()->role == 'user')
    @php $role = 'user' @endphp
@endif


<div class="nav-group show">
    <a href="#" class="nav-label">Produk Ilmiah</a>
    <ul class="nav nav-sidebar">

        <li class="nav-item">
            <a href="{{ asset("$role/puslit/info-singkat") }}"
                class="nav-link {{ request()->is("$role/puslit/info-singkat") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Info Singkat</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/jurnal-kajian") }}"
                class="nav-link {{ request()->is("$role/puslit/jurnal-kajian*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Jurnal Kajian</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/jurnal-kepakaran") }}"
                class="nav-link {{ request()->is("$role/puslit/jurnal-kepakaran*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Jurnal Kepakaran</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/buku-tim") }}"
                class="nav-link {{ request()->is("$role/puslit/buku-tim*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Buku Tim</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/buku-lintas-tim") }}"
                class="nav-link {{ request()->is("$role/puslit/buku-lintas-tim*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Buku Lintas Tim</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/buku-individu") }}"
                class="nav-link {{ request()->is("$role/puslit/buku-individu*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Buku Individu</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/hasil-penelitian") }}"
                class="nav-link {{ request()->is("$role/puslit/hasil-penelitian*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Hasil Penelitian</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/kajian-analisis") }}"
                class="nav-link {{ request()->is("$role/puslit/kajian-analisis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Kajian Analisis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/policy-brief") }}"
                class="nav-link {{ request()->is("$role/puslit/policy-brief*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Policy Brief</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/parliamentary-review") }}"
                class="nav-link {{ request()->is("$role/puslit/parliamentary-review*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Parliamentary Review</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/infografis") }}"
                class="nav-link {{ request()->is("$role/puslit/infografis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>infografis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/hasil-survey") }}"
                class="nav-link {{ request()->is("$role/puslit/hasil-survey*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Hasil Survey</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/isu-sepekan") }}"
                class="nav-link {{ request()->is("$role/puslit/isu-sepekan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Isu Sepekan</span></a>
        </li>
    </ul>
</div>


<div class="nav-group show">
    <a href="#" class="nav-label">Transaksi</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/permintaan-data") }}"
                class="nav-link {{ request()->is("$role/puslit/permintaan-data*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Permintaan Data</span></a>
        </li>
    </ul>
</div>



<div class="nav-group show">
    <a href="#" class="nav-label">Digit Doku</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/berkas-puslit") }}"
                class="nav-link {{ request()->is("$role/puslit/berkas-puslit*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Template Dokumen</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/perjalanan-dinas") }}"
                class="nav-link {{ request()->is("$role/puslit/perjalanan-dinas*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Perjalanan Dinas</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/fgd") }}"
                class="nav-link {{ request()->is("$role/puslit/fgd*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>FGD</span></a>

        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/laporan-kegiatan") }}"
                class="nav-link {{ request()->is("$role/puslit/laporan-kegiatan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Laporan Kegiatan</span></a>

        </li>
    </ul>
</div>



<div class="nav-group show">
    <a href="#" class="nav-label">Laporan</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puslit/laporan-kustom") }}"
                class="nav-link {{ request()->is("$role/puslit/laporan-kustom*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Laporan Kustom</span></a>
        </li>
    </ul>
</div>
