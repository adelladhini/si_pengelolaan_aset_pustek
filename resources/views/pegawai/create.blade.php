@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="card">
<div class="card-body">

<h4 class="mb-4">Tambah Pegawai</h4>

<form action="{{ route('pegawai.store') }}" method="POST">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label>NIP</label>
<input type="text"
       name="nip"
       class="form-control @error('nip') is-invalid @enderror"
       value="{{ old('nip') }}"
       required>

@error('nip')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>


<div class="col-md-6 mb-3">
<label>Nama</label>
<input type="text"
       name="nama"
       class="form-control @error('nama') is-invalid @enderror"
       value="{{ old('nama') }}"
       required>

@error('nama')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>


<div class="col-md-6 mb-3">
<label>Jabatan</label>
<input type="text"
       name="jabatan"
       class="form-control"
       value="{{ old('jabatan') }}"
       placeholder="Contoh: Analis Sistem">
</div>


<div class="col-md-6 mb-3">
<label>Unit Kerja</label>
<input type="text"
       name="unit_kerja"
       class="form-control"
       value="{{ old('unit_kerja') }}"
       placeholder="Contoh: Pustekinfo">
</div>


<div class="col-md-6 mb-3">
<label>No HP</label>
<input type="text"
       name="no_hp"
       class="form-control"
       value="{{ old('no_hp') }}">
</div>


<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email"
       name="email"
       class="form-control"
       value="{{ old('email') }}">
</div>


<div class="col-md-6 mb-3">
<label>TMT Pensiun</label>
<input type="date"
       name="tmt_pensiun"
       class="form-control"
       value="{{ old('tmt_pensiun') }}">
</div>

</div>


<button class="btn btn-primary">
Simpan
</button>

<a href="{{ route('pegawai.index') }}"
   class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

</div>

@endsection