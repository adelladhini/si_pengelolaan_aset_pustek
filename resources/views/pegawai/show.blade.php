@extends('layouts.app')

@section('content')

<div class="mb-4 d-flex justify-content-between align-items-center">

<div>
<h4 class="fw-bold mb-1">Detail Pegawai</h4>
<p class="text-muted mb-0">Informasi pegawai dan tablet yang dipinjam</p>
</div>

<a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm">
<i class="ri-arrow-left-line"></i> Kembali
</a>

</div>

{{-- ================================
PROFIL PEGAWAI
================================ --}}

<div class="card shadow-sm border-0 rounded-4 mb-4">

<div class="card-body">

<div class="row">

<div class="col-md-4">

<p class="text-muted mb-1">Nama Pegawai</p>
<h6 class="fw-semibold">{{ $pegawai->nama }}</h6>

</div>

<div class="col-md-4">

<p class="text-muted mb-1">NIP</p>
<h6 class="fw-semibold">{{ $pegawai->nip }}</h6>

</div>

<div class="col-md-4">

<p class="text-muted mb-1">TMT Pensiun</p>
<h6 class="fw-semibold">
{{ \Carbon\Carbon::parse($pegawai->tmt_pensiun)->format('d M Y') }}
</h6>

</div>

</div>

</div>

</div>

{{-- ================================
TABLET YANG DIPINJAM
================================ --}}

<div class="card shadow-sm border-0 rounded-4">

<div class="card-body">

<h5 class="mb-3">Tablet yang Dipinjam</h5>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>
<th>Kode Tablet</th>
<th>Nama Aset</th>
<th>Tanggal Pinjam</th>
<th>Status</th>
<th width="200">Aksi</th>
</tr>

</thead>

<tbody>

@forelse($transaksi as $item)

<tr>

<td class="fw-semibold">
{{ $item->aset->kode_aset }}
</td>

<td>
{{ $item->aset->nama_aset }}
</td>

<td>
{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}
</td>

<td>

@if(is_null($item->tanggal_kembali))

<span class="badge bg-warning text-dark">
Dipinjam
</span>

@else

<span class="badge bg-success">
Dikembalikan
</span>

@endif

</td>

<td>

@if(is_null($item->tanggal_kembali))

<form action="{{ route('pegawai.kembalikanTablet',$item->id) }}" method="POST">

@csrf
@method('PATCH')

<button class="btn btn-success btn-sm"
onclick="return confirm('Tablet sudah dikembalikan?')">

<i class="ri-checkbox-circle-line"></i>
Tandai Dikembalikan

</button>

</form>

@else

<span class="badge bg-success">
Selesai
</span>

@endif

</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center text-muted">
Tidak ada tablet dipinjam
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@endsection
