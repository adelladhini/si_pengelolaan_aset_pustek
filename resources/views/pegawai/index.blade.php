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
<div class="card-body">

<form method="GET" action="{{ route('pegawai.index') }}">

<div class="search-wrapper"> <!-- TAMBAHAN -->
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
    {{ $pegawai->firstItem() + $loop->index }}
    </td>

    <td>{{ $item->nip }}</td>

    <td>{{ $item->nama }}</td>

    <td>{{ $item->jabatan ?? '-' }}</td>

    <td>{{ $item->unit_kerja ?? '-' }}</td>

    <td class="text-center">
    @if($item->tmt_pensiun)
    @php
    $pensiun = \Carbon\Carbon::parse($item->tmt_pensiun);
    @endphp

    <span class="{{ $pensiun->diffInDays(now()) <= 30 ? 'text-danger fw-semibold' : '' }}">
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
        onclick="confirmDeletePegawai({{ $item->id }})">
        <i class="bi bi-trash"></i>
    </button>

</form>

    </td>

    </tr>

    @empty
    <tr>
    <td colspan="9" class="text-center text-muted py-3">
    Belum ada data pegawai
    </td>
    </tr>
    @endforelse
    </tbody>

    </table>

    </div>
    </div>


    <!-- PAGINATION -->
    <div class="mt-3">
    {{ $pegawai->withQueryString()->links() }}
    </div>

    </div>

    @endsection