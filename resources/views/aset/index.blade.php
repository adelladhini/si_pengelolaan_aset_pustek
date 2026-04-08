@extends('layouts.app')

@section('content')

<div class="container-fluid">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Data Aset</h4>

    <a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg"></i> Tambah Aset
    </a>
</div>

<!-- SEARCH + FILTER -->
<div class="card shadow-sm border-0 mb-3">
<div class="card-body">

<form method="GET" action="{{ route('aset.index') }}">

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

            <a href="{{ route('aset.index') }}"
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

                <!-- TIPE -->
                <label class="form-label">Tipe</label>
                <select name="tipe" class="form-select select2 mb-2">
                    <option value="">Semua</option>
                    @foreach($tipeList as $tipe)
                        <option value="{{ $tipe }}" {{ request('tipe') == $tipe ? 'selected' : '' }}>
                            {{ $tipe }}
                        </option>
                    @endforeach
                </select>

                <!-- KONDISI -->
                <label class="form-label">Kondisi</label>
                <select name="kondisi" class="form-select select2 mb-2">
                    <option value="">Semua</option>
                    <option value="baik">Baik</option>
                    <option value="rusak ringan">Rusak Ringan</option>
                    <option value="rusak berat">Rusak Berat</option>
                    <option value="hilang">Hilang</option>
                </select>

                <!-- TAHUN -->
                <label class="form-label">Tahun</label>
                <select name="tahun" class="form-select select2 mb-3">
                    <option value="">Semua</option>
                    @foreach($tahunList as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endforeach
                </select>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('aset.index') }}" class="btn btn-light btn-sm">Reset</a>
                    <button class="btn btn-primary btn-sm">Terapkan</button>
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
<th>Kode BMN</th>
<th>Tipe</th>
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

<td>{{ $item->kode_bmn }}</td>
<td>{{ $item->tipe }}</td>
<td>{{ $item->merk ?? '-' }}</td>
<td>{{ $item->serial_number ?? '-' }}</td>
<td>{{ $item->imei ?? '-' }}</td>
<td>{{ $item->tahun_pengadaan ?? '-' }}</td>

<!-- KONDISI -->
<td class="text-center">
@if(strtolower($item->kondisi) == 'baik')
<span class="badge-custom badge-baik">Baik</span>

@elseif(strtolower($item->kondisi) == 'rusak ringan')
<span class="badge-custom badge-ringan">Rusak Ringan</span>

@elseif(strtolower($item->kondisi) == 'rusak berat')
<span class="badge-custom badge-berat">Rusak Berat</span>

@elseif(strtolower($item->kondisi) == 'hilang')
<span class="badge-custom badge-hilang">Hilang</span>

@else
<span class="badge bg-secondary">-</span>
@endif
</td>

<!-- STATUS -->
<td class="text-center">
@if(strtolower($item->status) == 'tersedia')
<span class="badge-custom badge-tersedia">Tersedia</span>
@else
<span class="badge-custom badge-dipakai">Dipakai</span>
@endif
</td>

<!-- AKSI -->
<td class="text-center">

<a href="{{ route('aset.edit',$item->id) }}"
class="btn btn-edit btn-sm me-1">
<i class="bi bi-pencil"></i>
</a>

<form id="delete-form-aset-{{ $item->id }}"
    action="{{ route('aset.destroy',$item->id) }}"
    method="POST"
    class="d-inline">

    @csrf
    @method('DELETE')

    <button type="button"
        class="btn btn-delete btn-sm"
        onclick="confirmDeleteAset({{ $item->id }})">
        <i class="bi bi-trash"></i>
    </button>

</form>

</td>

</tr>

@empty
<tr>
<td colspan="10" class="text-center text-muted py-3">
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