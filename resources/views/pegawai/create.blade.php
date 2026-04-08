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
       placeholder="Analis Sistem">
</div>


<div class="col-md-6 mb-3">
<label>Unit Kerja</label>
<input type="text"
       name="unit_kerja"
       class="form-control"
       value="{{ old('unit_kerja') }}"
       placeholder="Pustekinfo">
</div>

<div class="col-md-6 mb-3">
<label>Gedung</label>
<input type="text"
       name="gedung"
       class="form-control"
       value="{{ old('gedung') }}"
       placeholder="Nusantara 1">
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

<div class="d-flex justify-content-between mt-3">

    <!-- KIRI -->
    <a href="{{ route('pegawai.index') }}" class="btn btn-outline-secondary">
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