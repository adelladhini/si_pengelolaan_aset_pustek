@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
<h4 class="fw-bold mb-0">Tambah Data Aset</h4>
<p class="text-muted">Input data aset tablet Pustekinfo</p>
</div>

<div class="card">
<div class="card-body">

<form action="{{ route('aset.store') }}" method="POST">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Kode BMN</label>

<input type="text"
name="kode_bmn"
class="form-control @error('kode_bmn') is-invalid @enderror"
value="{{ old('kode_bmn') }}"
required>

@error('kode_bmn')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Tipe</label>

<input type="text"
name="tipe"
class="form-control"
placeholder="Samsung Galaxy Tab S8 5G"
value="{{ old('tipe') }}"
required>

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Merk</label>

<input type="text"
name="merk"
class="form-control"
placeholder="Samsung"
value="{{ old('merk') }}">

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Serial Number</label>

<input type="text"
name="serial_number"
class="form-control @error('serial_number') is-invalid @enderror"
value="{{ old('serial_number') }}">

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
value="{{ old('imei') }}">

@error('imei')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Tahun Pengadaan</label>

<input type="text"
name="tahun_pengadaan"
class="form-control"
placeholder="2022"
maxlength="4"
value="{{ old('tahun_pengadaan') }}"
oninput="this.value = this.value.replace(/[^0-9]/g, '')">

</div>


<div class="col-md-6 mb-3">
<label class="form-label">Kondisi</label>

<select name="kondisi" class="form-select">

<option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>
Baik
</option>

<option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
Rusak Ringan
</option>

<option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
Rusak Berat
</option>

<option value="Hilang" {{ old('kondisi') == 'Hilang' ? 'selected' : '' }}>
Hilang
</option>

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
        Simpan
    </button>

</div>


</form>

</div>
</div>

</div>

@endsection