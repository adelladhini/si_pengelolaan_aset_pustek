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
                               class="form-control"
                               value="{{ old('nip', $pegawai->nip) }}"
                               required>
                    </div>

                    <!-- Nama -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama', $pegawai->nama) }}"
                               required>
                    </div>

                    <!-- Jabatan -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text"
                               name="jabatan"
                               class="form-control"
                               value="{{ old('jabatan', $pegawai->jabatan) }}"
                               required>
                    </div>

                    <!-- Satker -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Satuan Kerja</label>
                        <select name="satker_id" class="form-control" required>

                            @foreach($satker as $s)
                                <option value="{{ $s->id }}"
                                    {{ old('satker_id', $pegawai->satker_id) == $s->id ? 'selected' : '' }}>
                                    {{ $s->nama_satker }}
                                </option>
                            @endforeach

                        </select>
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