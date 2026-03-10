@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Jabatan</h4>

    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Jabatan</label>
            <select name="jenis_jabatan" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Struktural">Struktural</option>
                <option value="Fungsional">Fungsional</option>
                <option value="Pejabat Pengelola">Pejabat Pengelola</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection