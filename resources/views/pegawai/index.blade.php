@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
<h4 class="fw-bold mb-0">Data Pegawai</h4>
<p class="text-muted mb-0">Daftar pegawai yang menggunakan tablet</p>
</div>

<a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">
<i class="bi bi-plus-lg"></i> Tambah Pegawai
</a>

</div>


{{-- ================================
SEARCH
================================ --}}

<div class="card shadow-sm border-0 mb-3">
<div class="card-body">

<form method="GET" action="{{ route('pegawai.index') }}">

<div class="row align-items-center g-2">

<div class="col-md-4">

<div class="input-group">

<span class="input-group-text bg-white">
<i class="bi bi-search"></i>
</span>

<input type="text"
name="search"
class="form-control"
placeholder="Cari NIP / Nama..."
value="{{ request('search') }}">

<button class="btn btn-success btn-sm">
Cari
</button>

</div>

</div>

<div class="col-md-2">

<a href="{{ route('pegawai.index') }}"
class="btn btn-secondary btn-sm">
Reset
</a>

</div>

</div>

</form>

</div>
</div>


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">
{{ session('success') }}

<button type="button"
class="btn-close"
data-bs-dismiss="alert"></button>

</div>

@endif


{{-- ================================
TABLE
================================ --}}

<div class="card shadow-sm border-0">

<div class="card-body table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-light text-center">

<tr>
<th width="60">No</th>
<th>NIP</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Unit Kerja</th>
<th>No HP</th>
<th>Email</th>
<th>TMT Pensiun</th>
<th width="200">Aksi</th>
</tr>

</thead>

<tbody>

@forelse($pegawai as $item)

<tr>

<td class="text-center">
{{ $pegawai->firstItem() + $loop->index }}
</td>

<td>{{ $item->nip }}</td>

<td class="fw-semibold">
{{ $item->nama }}
</td>

<td>{{ $item->jabatan ?? '-' }}</td>

<td>{{ $item->unit_kerja ?? '-' }}</td>

<td>{{ $item->no_hp ?? '-' }}</td>

<td>{{ $item->email ?? '-' }}</td>

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
class="btn btn-info btn-sm me-1"
title="Detail Pegawai">
<i class="bi bi-eye"></i>
</a>

<a href="{{ route('pegawai.edit',$item->id) }}"
class="btn btn-warning btn-sm me-1"
title="Edit">
<i class="bi bi-pencil"></i>
</a>

<form action="{{ route('pegawai.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus pegawai ini?')"
title="Hapus">

<i class="bi bi-trash"></i>

</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="9" class="text-center text-muted">
Belum ada data pegawai
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>


<div class="mt-3">
{{ $pegawai->withQueryString()->links() }}
</div>

</div>

@endsection