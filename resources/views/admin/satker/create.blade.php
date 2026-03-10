@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h4 class="mb-4">Tambah Satuan Kerja</h4>

            <form action="{{ route('satker.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Satker</label>
                    <input type="text"
                           name="nama_satker"
                           class="form-control @error('nama_satker') is-invalid @enderror"
                           value="{{ old('nama_satker') }}"
                           required>

                    @error('nama_satker')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('satker.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection