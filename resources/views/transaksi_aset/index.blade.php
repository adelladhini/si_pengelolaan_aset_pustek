@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Data Transaksi Aset</h4>

    <a href="{{ route('transaksi-aset.create') }}" class="btn btn-primary btn-sm">
        + Tambah Transaksi
    </a>
</div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="alert alert-custom-success alert-dismissible fade show mb-3">
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
    <th width="150">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($transaksi as $item)

<tr>

<td class="text-center">{{ $loop->iteration }}</td>

<td>{{ $item->pegawai->nama ?? '-' }}</td>

<td>
{{ $item->aset->kode_bmn ?? '-' }} - {{ $item->aset->tipe ?? '-' }}
</td>

<td class="text-center">{{ $item->tanggal_pinjam }}</td>

<td class="text-center">{{ $item->tanggal_kembali ?? '-' }}</td>

<td class="text-center">
    @if(is_null($item->tanggal_kembali))
        <span class="badge-custom badge-ringan">Dipinjam</span>
    @else
        <span class="badge-custom badge-baik">Dikembalikan</span>
    @endif
</td>

<td class="text-center">

    <!-- SHOW -->
<a href="{{ route('transaksi-aset.show', $item->id) }}"
   class="btn btn-primary btn-sm px-2 py-1 me-1"
   title="Detail">
    <i class="bi bi-eye"></i>
</a>

    @if(is_null($item->tanggal_kembali))
    <!-- KEMBALIKAN -->
    <button 
        class="btn btn-success btn-sm px-2 py-1 me-1"
        data-bs-toggle="modal"
        data-bs-target="#modalKembalikan{{ $item->id }}"
        title="Tandai Dikembalikan">

        <i class="bi bi-check-circle"></i>
    </button>
    @endif

    <!-- DELETE -->
    <form id="delete-form-transaksi-{{ $item->id }}"
        action="{{ route('transaksi-aset.destroy',$item->id) }}"
        method="POST"
        class="d-inline">

        @csrf
        @method('DELETE')

        <button type="button"
                class="btn btn-danger btn-sm px-2 py-1"
                onclick="confirmDeleteTransaksi({{ $item->id }})"
                title="Hapus">
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

@foreach($transaksi as $item)
    @include('transaksi_aset.pengembalian', ['item' => $item])
@endforeach

@endsection