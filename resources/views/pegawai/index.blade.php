@extends('layouts.app')

@section('content')

    <div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">Data Pegawai</h4>

        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Pegawai
        </a>

    </div>

<!-- SEARCH -->
<div class="card shadow-sm border-0 mb-3">
<div class="card shadow-sm border-0 mb-3">
<div class="card-body">

<form method="GET" action="{{ route('pegawai.index') }}">

<div class="row align-items-center g-2">

    <!-- SEARCH -->
    <div class="col-md-4">

        <div class="search-wrapper">
            <div class="search-box">

                <input type="text"
                name="search"
                class="form-control"
                placeholder="Cari..."
                value="{{ request('search') }}">

                <button class="btn btn-success btn-search">
                    <i class="bi bi-search"></i>
                </button>

                <a href="{{ route('pegawai.index') }}"
                class="btn btn-reset">
                    <i class="bi bi-x"></i>
                </a>

            </div>
        </div>

    </div>

    <!-- FILTER -->
    <div class="col-md-8 text-end">

        <div class="dropdown d-inline-block">

            <button class="btn btn-outline-secondary dropdown-toggle"
                data-bs-toggle="dropdown"
                data-bs-display="static"
                data-bs-boundary="viewport">
                <i class="bi bi-funnel"></i> Filter
            </button>

            <div class="dropdown-menu dropdown-menu-end p-3 shadow filter-dropdown">

                <!-- STATUS PENSIUN -->
                <label class="form-label fw-semibold">
                    Status Pensiun
                </label>

                <select name="status_pensiun"
                    class="form-select select2 mb-3">

                    <option value="">Semua</option>

                    <option value="belum"
                        {{ request('status_pensiun') == 'belum' ? 'selected' : '' }}>
                        Belum Pensiun
                    </option>

                    <option value="akan"
                        {{ request('status_pensiun') == 'akan' ? 'selected' : '' }}>
                        Akan Pensiun
                    </option>

                    <option value="sudah"
                        {{ request('status_pensiun') == 'sudah' ? 'selected' : '' }}>
                        Sudah Pensiun
                    </option>

                </select>

                <!-- STATUS PEMINJAMAN -->
                <label class="form-label fw-semibold">
                    Status Peminjaman
                </label>

                <select name="status_peminjaman"
                    class="form-select select2 mb-3">

                    <option value="">Semua</option>

                    <option value="meminjam"
                        {{ request('status_peminjaman') == 'meminjam' ? 'selected' : '' }}>
                        Sedang Meminjam
                    </option>

                    <option value="tidak"
                        {{ request('status_peminjaman') == 'tidak' ? 'selected' : '' }}>
                        Tidak Meminjam
                    </option>

                </select>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between">

                    <a href="{{ route('pegawai.index') }}"
                        class="btn btn-light btn-sm">
                        Reset
                    </a>

                    <button class="btn btn-primary btn-sm">
                        Terapkan
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

</form>

</div>
</div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="alert alert-custom-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

<!-- TABLE -->
<div class="card shadow-sm border-0 mb-3">
    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover align-middle mb-0">

            <thead class="table-light text-center">
                <tr>
                    <th width="60">No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th width="250">Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>TMT Pensiun</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pegawai as $item)
                <tr>

                    <td class="text-center">
                        {{ method_exists($pegawai,'firstItem') ? $pegawai->firstItem() + $loop->index : $loop->iteration }}
                    </td>

                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan ?? '-' }}</td>
                    <td>{{ $item->unit_kerja ?? '-' }}</td>

                    <!-- 🔥 TMT PENSIUN FIX -->
                    <td class="text-center">
                        @if($item->tmt_pensiun)
                            @php
                                $pensiun = \Carbon\Carbon::parse($item->tmt_pensiun);
                            @endphp

                            <span class="
                                @if($pensiun->isPast())
                                    text-danger fw-bold
                                @elseif($pensiun->diffInDays(now()) <= 7)
                                    text-danger fw-semibold
                                @endif
                            ">
                                {{ $pensiun->format('d-m-Y') }}
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    <td class="text-center">

                        <a href="{{ route('pegawai.show',$item->id) }}"
                           class="btn btn-detail btn-sm me-1">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('pegawai.edit',$item->id) }}"
                           class="btn btn-edit btn-sm me-1">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form id="delete-form-pegawai-{{ $item->id }}"
                              action="{{ route('pegawai.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                    class="btn btn-delete btn-sm"
                                    onclick="confirmDelete('pegawai', {{ $item->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        Belum ada data pegawai
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

<!-- PAGINATION -->
<div class="d-flex justify-content-end align-items-center mt-3">
    {{ $pegawai->withQueryString()->links('pagination::bootstrap-5') }}
</div>

@endsection