@if (auth()->user()->role == 'admin')
    @php $role = 'admin' @endphp
@elseif(auth()->user()->role == 'user')
    @php $role = 'user' @endphp
@endif

<div class="nav-group show">
    <a href="#" class="nav-label">Produk Ilmiah</a>
    <ul class="nav nav-sidebar">

        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/naskah-akademik") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/naskah-akademik*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Naskah Akademik</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/draft-ruu") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/draft-ruu*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>RUU</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/jurnal-prodigy") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/jurnal-prodigy*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Jurnal Prodigy</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/proceeding") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/proceeding*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Proceeding</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/pedoman-kerja") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/pedoman-kerja*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Pedoman Kerja</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/buku") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/buku*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Buku</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/info-legislasi") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/info-legislasi*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Info Legislasi</span></a>
        </li>

    </ul>
</div>


<div class="nav-group show">
    <a href="#" class="nav-label">Simas PUU</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-pekerjaan") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-pekerjaan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Pekerjaan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-pendidikan-terakhir") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-pendidikan-terakhir*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Pendidikan Terakhir</span></a>
        </li>

        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-indikator") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-indikator*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Indikator</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-database-mitra") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-database-mitra*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Database Mitra</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-kelompok-lobi") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-kelompok-lobi*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Kelompok Lobi</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-pertanyaan") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-pertanyaan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Pertanyaan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-responden") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-responden*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Responden</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-penyusunan") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-penyusunan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Penyusunan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/onleg-catatan") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/onleg-catatan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Catatan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/surat-permintaan") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/surat-permintaan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Surat Permintaan</span></a>
        </li>
    </ul>
</div>

<div class="nav-group show">
    <a href="#" class="nav-label">Laporan</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puuekkukesra/laporan-kustom") }}"
                class="nav-link {{ request()->is("$role/puuekkukesra/laporan-kustom*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Laporan Kustom</span></a>
        </li>
    </ul>
</div>
