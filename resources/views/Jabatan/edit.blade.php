@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Jabatan</h4>

    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                   value="{{ $jabatan->nama_jabatan }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Jabatan</label>
            <select name="jenis_jabatan" class="form-control" required>
                <option value="Struktural"
                    {{ $jabatan->jenis_jabatan == 'Struktural' ? 'selected' : '' }}>
                    Struktural
                </option>
                <option value="Fungsional"
                    {{ $jabatan->jenis_jabatan == 'Fungsional' ? 'selected' : '' }}>
                    Fungsional
                </option>
                <option value="Pejabat Pengelola"
                    {{ $jabatan->jenis_jabatan == 'Pejabat Pengelola' ? 'selected' : '' }}>
                    Pejabat Pengelola
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan"
                      class="form-control">{{ $jabatan->keterangan }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection