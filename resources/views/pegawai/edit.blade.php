@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-3">
<h4>Edit Pegawai</h4>

<a href="{{ route('pegawai.index') }}" class="btn btn-secondary">
Kembali
</a>
</div>


<div class="card">
<div class="card-body">

<form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">

<!-- NIP -->
<div class="col-md-6 mb-3">
<label class="form-label">NIP</label>
<input type="text"
       name="nip"
       class="form-control @error('nip') is-invalid @enderror"
       value="{{ old('nip', $pegawai->nip) }}"
       required>

@error('nip')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>


<!-- Nama -->
<div class="col-md-6 mb-3">
<label class="form-label">Nama</label>
<input type="text"
       name="nama"
       class="form-control @error('nama') is-invalid @enderror"
       value="{{ old('nama', $pegawai->nama) }}"
       required>

@error('nama')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>


<!-- Jabatan -->
<div class="col-md-6 mb-3">
<label class="form-label">Jabatan</label>
<input type="text"
       name="jabatan"
       class="form-control"
       value="{{ old('jabatan', $pegawai->jabatan) }}">
</div>


<!-- Unit Kerja -->
<div class="col-md-6 mb-3">
<label class="form-label">Unit Kerja</label>
<input type="text"
       name="unit_kerja"
       class="form-control"
       value="{{ old('unit_kerja', $pegawai->unit_kerja) }}">
</div>


<!-- No HP -->
<div class="col-md-6 mb-3">
<label class="form-label">No HP</label>
<input type="text"
       name="no_hp"
       class="form-control"
       value="{{ old('no_hp', $pegawai->no_hp) }}">
</div>


<!-- Email -->
<div class="col-md-6 mb-3">
<label class="form-label">Email</label>
<input type="email"
       name="email"
       class="form-control"
       value="{{ old('email', $pegawai->email) }}">
</div>


<!-- TMT Pensiun -->
<div class="col-md-6 mb-3">
<label class="form-label">TMT Pensiun</label>
<input type="date"
       name="tmt_pensiun"
       class="form-control"
       value="{{ old('tmt_pensiun', $pegawai->tmt_pensiun ? \Carbon\Carbon::parse($pegawai->tmt_pensiun)->format('Y-m-d') : '') }}">
</div>

</div>


<div class="mt-3">
<button class="btn btn-primary">
Simpan Perubahan
</button>
</div>

</form>

</div>
</div>

</div>

@endsection