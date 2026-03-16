@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
<h4 class="fw-bold mb-0">Data Transaksi Aset</h4>

<a href="{{ route('transaksi-aset.create') }}" class="btn btn-primary btn-sm">
+ Tambah Transaksi
</a>
</div>


@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
{{ session('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif


<div class="card">
<div class="card-body table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-light text-center">

<tr>
<th width="60">No</th>
<th>Pegawai</th>
<th>Tablet</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th width="160">Aksi</th>
</tr>

</thead>

<tbody>

@forelse($transaksi as $item)

<tr>

<td class="text-center">
{{ $loop->iteration }}
</td>

<td>
{{ $item->pegawai->nama ?? '-' }}
</td>

<td>
{{ $item->aset->kode_aset ?? '-' }} - {{ $item->aset->nama_aset ?? '-' }}
</td>

<td class="text-center">
{{ $item->tanggal_pinjam }}
</td>

<td class="text-center">
{{ $item->tanggal_kembali ?? '-' }}
</td>


<td class="text-center">

@if(is_null($item->tanggal_kembali))
<span class="badge bg-warning">Dipinjam</span>
@else
<span class="badge bg-success">Dikembalikan</span>
@endif

</td>


<td class="text-center">

@if(is_null($item->tanggal_kembali))

<form action="{{ route('transaksi-aset.kembali',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('PATCH')

<button class="btn btn-success btn-sm me-1"
onclick="return confirm('Tablet sudah dikembalikan?')">

<i class="bi bi-arrow-return-left"></i>

</button>

</form>

@endif


<form action="{{ route('transaksi-aset.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus transaksi ini?')">

<i class="bi bi-trash"></i>

</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center">
Belum ada transaksi
</td>
</tr>

@endforelse

</tbody>

</table>

</div>
</div>

</div>

@endsection