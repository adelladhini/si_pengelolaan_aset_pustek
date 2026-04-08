@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
<h4 class="fw-bold mb-0">Edit Data Aset</h4>
<p class="text-muted">Perbarui data aset</p>
</div>

<div class="card">
<div class="card-body">

<form action="{{ route('aset.update', $aset->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Kode Aset</label>

<input type="text"
name="kode_bmn"
class="form-control @error('kode_bmn') is-invalid @enderror"
value="{{ old('kode_bmn', $aset->kode_bmn) }}"
required>

@error('kode_bmn')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>

<div class="col-md-6 mb-3">
<label class="form-label">Nama Aset</label>

<input type="text"
name="tipe"
class="form-control"
value="{{ old('tipe', $aset->tipe) }}"
required>

</div>

<div class="col-md-6 mb-3">
<label class="form-label">Merk</label>

<input type="text"
name="merk"
class="form-control"
value="{{ old('merk', $aset->merk) }}">

</div>

<div class="col-md-6 mb-3">
<label class="form-label">Serial Number</label>

<input type="text"
name="serial_number"
class="form-control @error('serial_number') is-invalid @enderror"
value="{{ old('serial_number', $aset->serial_number) }}">

@error('serial_number')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>

<div class="col-md-6 mb-3">
<label class="form-label">IMEI</label>

<input type="text"
name="imei"
class="form-control @error('imei') is-invalid @enderror"
value="{{ old('imei', $aset->imei) }}">

@error('imei')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>

<div class="col-md-6 mb-3">
<label class="form-label">Tahun Pengadaan</label>

<input type="number"
name="tahun_pengadaan"
class="form-control"
value="{{ old('tahun_pengadaan', $aset->tahun_pengadaan) }}">
</div>

{{-- ================= KONDISI (FIX) ================= --}}
<div class="col-md-6 mb-3">
<label class="form-label">Kondisi</label>

<select name="kondisi" class="form-select">
@foreach (['Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang'] as $k)
<option value="{{ $k }}"
{{ trim(strtolower(old('kondisi', $aset->kondisi))) == strtolower($k) ? 'selected' : '' }}>
{{ $k }}
</option>
@endforeach
</select>

</div>

{{-- ================= STATUS (FIX) ================= --}}
<div class="col-md-6 mb-3">
<label class="form-label">Status</label>

<select name="status" class="form-select">
@foreach (['Tersedia', 'Dipakai'] as $s)
<option value="{{ $s }}"
{{ trim(strtolower(old('status', $aset->status))) == strtolower($s) ? 'selected' : '' }}>
{{ $s }}
</option>
@endforeach
</select>

</div>

</div>

<div class="d-flex justify-content-between mt-3">

    <!-- KIRI -->
    <a href="{{ route('aset.index') }}" class="btn btn-outline-secondary">
        Kembali
    </a>

    <!-- KANAN -->
    <button type="submit" class="btn btn-primary">
        Simpan Perubahan
    </button>

</div>

</form>

</div>
</div>

</div>

@endsection