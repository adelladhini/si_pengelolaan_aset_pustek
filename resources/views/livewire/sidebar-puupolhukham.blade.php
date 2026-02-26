@if (auth()->user()->role == 'admin')
    @php $role = 'admin' @endphp
@elseif(auth()->user()->role == 'user')
    @php $role = 'user' @endphp
@endif

<div class="nav-group show">
    <a href="#" class="nav-label">Produk Ilmiah</a>
    <ul class="nav nav-sidebar">

    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/naskah_akademik") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/naskah_akademik*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Naskah Akademik</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/draft_ruu") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/draft_ruu*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>RUU</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/jurnal_prodigy") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/jurnal_prodigy*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Jurnal Prodigy</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/proceeding") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/proceeding*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Proceeding</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/pedoman_kerja") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/pedoman_kerja*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Pedoman Kerja</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/buku") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/buku*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Buku</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ asset("$role/puupolhukham/info_legislasi") }}"
            class="nav-link {{ request()->is("$role/puupolhukham/info_legislasi*") ? ' active' : '' }}"><i class="ri-folder-2-line"></i>
            <span>Info Legislasi</span></a>
    </li>

    </ul>
</div>
