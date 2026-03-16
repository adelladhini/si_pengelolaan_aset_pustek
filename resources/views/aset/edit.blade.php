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
name="kode_aset"
class="form-control @error('kode_aset') is-invalid @enderror"
value="{{ old('kode_aset', $aset->kode_aset) }}"
required>

@error('kode_aset')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Nama Aset</label>

<input type="text"
name="nama_aset"
class="form-control"
value="{{ old('nama_aset', $aset->nama_aset) }}"
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


<div class="col-md-6 mb-3">
<label class="form-label">Kondisi</label>

<select name="kondisi" class="form-select">

<option value="Baik" {{ $aset->kondisi == 'Baik' ? 'selected' : '' }}>
Baik
</option>

<option value="Rusak Ringan" {{ $aset->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>
Rusak Ringan
</option>

<option value="Rusak Berat" {{ $aset->kondisi == 'Rusak Berat' ? 'selected' : '' }}>
Rusak Berat
</option>

</select>

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="Tersedia" {{ $aset->status == 'Tersedia' ? 'selected' : '' }}>
Tersedia
</option>

<option value="Dipakai" {{ $aset->status == 'Dipakai' ? 'selected' : '' }}>
Dipakai
</option>

</select>

</div>

</div>


<div class="d-flex justify-content-end">

<a href="{{ route('aset.index') }}"
class="btn btn-secondary me-2">
Kembali
</a>

<button type="submit"
class="btn btn-primary">
Update Aset
</button>

</div>

</form>

</div>
</div>

</div>

@endsection