@if (auth()->user()->role == 'admin')
    @php $role = 'admin' @endphp
@elseif(auth()->user()->role == 'user')
    @php $role = 'user' @endphp
@endif

<div class="nav-group show">
    <a href="#" class="nav-label">Produk Ilmiah</a>
    <ul class="nav nav-sidebar">

        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/keterangan") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/keterangan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Keterangan DPR</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/kajian") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/kajian*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Kajian & Analisis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/evaluasi") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/evaluasi*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Evaluasi UU</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/buku") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/buku*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Buku</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/infografis") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/infografis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Infografis</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/info_judicial_review") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/info_judicial_review*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Info Judicial Review</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/kompilasi") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/kompilasi*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Anotasi</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/analisis") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/analisis*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i>
                <span>Analisis Peraturan Pelaksana</span></a>
        </li>
    </ul>
</div>


<div class="nav-group show">
    <a href="#" class="nav-label">Pemantauan Peraturan Pelaksanaan</a>
    <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/status_peraturan") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/status_peraturan*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Daftar Status Peraturan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/status_perkara") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/status_perkara*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Daftar Status Perkara</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ asset("$role/puspanlakuu/bentuk") }}"
                class="nav-link {{ request()->is("$role/puspanlakuu/bentuk*") ? ' active' : '' }}"><i
                    class="ri-folder-2-line"></i> <span>Daftar Bentuk</span></a>
        </li>
    </ul>
</div>
