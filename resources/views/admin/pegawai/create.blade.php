@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h4 class="mb-4">Tambah Pegawai</h4>

            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf 

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text"
                        name="jabatan"
                        class="form-control @error('jabatan') is-invalid @enderror"
                        value="{{ old('jabatan') }}"
                        placeholder="Masukkan jabatan"
                        required>

                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Satuan Kerja</label>
                    <select name="satker_id" class="form-select" required>
                        <option value="">-- Pilih Satker --</option>
                        @foreach($satker as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_satker }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>TMT Pensiun</label>
                    <input type="date" name="tmt_pensiun" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status_pegawai" class="form-select">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection