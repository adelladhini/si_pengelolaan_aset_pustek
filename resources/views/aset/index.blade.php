@extends('layouts.app')

@section('content')

<div class="container-fluid">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
<h4 class="fw-bold mb-0">Data Aset</h4>

<a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm">
+ Tambah Aset
</a>
</div>


<!-- SEARCH & FILTER -->
<div class="card mb-3">
<div class="card-body">

<form method="GET" action="{{ route('aset.index') }}">

<div class="row g-2 align-items-center">

<div class="col-md-4">

<div class="input-group">

<span class="input-group-text bg-white">
<i class="bi bi-search"></i>
</span>

<input type="text"
name="search"
class="form-control"
placeholder="Cari kode / nama aset..."
value="{{ request('search') }}">

<button class="btn btn-success btn-sm">
Cari
</button>

</div>

</div>


<!-- FILTER STATUS -->
<div class="col-md-3">

<select name="status" class="form-control">

<option value="">Semua Status</option>

<option value="Tersedia"
{{ request('status') == 'Tersedia' ? 'selected' : '' }}>
Tersedia
</option>

<option value="Dipakai"
{{ request('status') == 'Dipakai' ? 'selected' : '' }}>
Dipakai
</option>

</select>

</div>


<div class="col-md-2">
<a href="{{ route('aset.index') }}" class="btn btn-secondary btn-sm">
Reset
</a>
</div>

</div>

</form>

</div>
</div>


<!-- SUCCESS MESSAGE -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
{{ session('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif


<!-- TABLE -->
<div class="card">
<div class="card-body table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-light text-center">

<tr>
<th width="60">No</th>
<th>Kode Aset</th>
<th>Nama Aset</th>
<th>Merk</th>
<th>Serial Number</th>
<th>IMEI</th>
<th>Tahun</th>
<th>Kondisi</th>
<th>Status</th>
<th width="150">Aksi</th>
</tr>

</thead>

<tbody>

@forelse($aset as $item)

<tr>

<td class="text-center">
{{ $aset->firstItem() + $loop->index }}
</td>

<td>{{ $item->kode_aset }}</td>

<td>{{ $item->nama_aset }}</td>

<td>{{ $item->merk ?? '-' }}</td>

<td>{{ $item->serial_number ?? '-' }}</td>

<td>{{ $item->imei ?? '-' }}</td>

<td>{{ $item->tahun_pengadaan ?? '-' }}</td>


<!-- KONDISI -->
<td class="text-center">

@if(strtolower($item->kondisi) == 'baik')
<span class="badge bg-success">Baik</span>

@elseif(strtolower($item->kondisi) == 'rusak ringan')
<span class="badge bg-warning">Rusak Ringan</span>

@else
<span class="badge bg-danger">Rusak Berat</span>

@endif

</td>


<!-- STATUS -->
<td class="text-center">

@if(strtolower($item->status) == 'tersedia')
<span class="badge bg-primary">Tersedia</span>

@else
<span class="badge bg-secondary">Dipakai</span>

@endif

</td>


<!-- AKSI -->
<td class="text-center">

<a href="{{ route('aset.edit',$item->id) }}"
class="btn btn-warning btn-sm me-1">

<i class="bi bi-pencil"></i>

</a>


<form action="{{ route('aset.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus aset ini?')">

<i class="bi bi-trash"></i>

</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="10" class="text-center">
Belum ada data aset
</td>
</tr>

@endforelse

</tbody>

</table>

</div>
</div>


<!-- PAGINATION -->
<div class="mt-3">
{{ $aset->withQueryString()->links() }}
</div>

</div>

@endsection