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
                        <label class="form-label">Kode BMN</label>
                        <input type="text"
                               name="kode_bmn"
                               class="form-control"
                               value="{{ $aset->kode_bmn }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Aset</label>
                        <input type="text"
                               name="nama_aset"
                               class="form-control"
                               value="{{ $aset->nama_aset }}"
                               required>
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
                               value="{{ $aset->tahun_pengadaan }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kondisi</label>

                        <select name="kondisi" class="form-select">
                            <option value="Baik" {{ $aset->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ $aset->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ $aset->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">
                            <option value="Tersedia" {{ $aset->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Digunakan" {{ $aset->status == 'Digunakan' ? 'selected' : '' }}>Digunakan</option>
                            <option value="Perbaikan" {{ $aset->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                        </select>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pegawai</label>

                        <select name="pegawai_id" class="form-select">

                            <option value="">-- Pilih Pegawai --</option>

                            @foreach($pegawai as $p)
                                <option value="{{ $p->id }}"
                                {{ $aset->pegawai_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3">{{ $aset->keterangan }}</textarea>
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