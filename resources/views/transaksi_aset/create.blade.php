@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
<h4 class="fw-bold mb-0">Tambah Transaksi Aset</h4>
<p class="text-muted">Serahkan tablet kepada pegawai</p>
</div>


<div class="card">
<div class="card-body">

<form action="{{ route('transaksi-aset.store') }}" method="POST">
@csrf

<div class="row">

<!-- PEGAWAI -->
<div class="col-md-6 mb-3">
<label class="form-label">Pegawai</label>

<select name="pegawai_id" class="form-select" required>

<option value="">-- Pilih Pegawai --</option>

@foreach($pegawai as $p)

<option value="{{ $p->id }}">
{{ $p->nama }}
</option>

@endforeach

</select>

</div>


<!-- TABLET -->
<div class="col-md-6 mb-3">
<label class="form-label">Tablet</label>

<select name="aset_id" class="form-select" required>

<option value="">-- Pilih Tablet --</option>

@foreach($aset as $a)

<option value="{{ $a->id }}">
{{ $a->kode_aset }} - {{ $a->nama_aset }}
</option>

@endforeach

</select>

</div>


<!-- KONDISI AWAL -->
<div class="col-md-6 mb-3">
<label class="form-label">Kondisi Awal Tablet</label>

<select name="kondisi_awal" class="form-select" required>

<option value="Baik">Baik</option>
<option value="Rusak Ringan">Rusak Ringan</option>
<option value="Rusak Berat">Rusak Berat</option>

</select>

</div>

</div>


<div class="d-flex justify-content-end">

<a href="{{ route('transaksi-aset.index') }}"
class="btn btn-secondary me-2">
Kembali
</a>

<button type="submit"
class="btn btn-primary">
Simpan Transaksi
</button>

</div>

</form>

</div>
</div>

</div>

@endsection