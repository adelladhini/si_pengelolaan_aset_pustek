@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item"><a href="{{ route('Daftar Pengguna Referensi') }}">Daftar Pengguna</a></li>
            </ol>
            <h4 class="main-title mb-0">{{ !empty($data) ? 'Edit' : 'Tambah' }} Pengguna</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').remove();
                    }, 3000);
                </script>
            @endif
            <div class="mb-3">
                <form id="FormEditPenggunaReferensi" method="POST" enctype="multipart/form-data"
                    action="{{ !empty($data) ? route('Edit Pengguna Referensi', $data->id) : route('Tambah Pengguna Referensi') }}">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{ !empty($data) ? $data->id : '' }}" />
                    <div class="mb-3">
                        <label for="id_pegawai" class="form-label fw-bold">Pegawai</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control w-50" id="id_pegawai" name="id_pegawai"
                                placeholder="Masukan Nama Pegawai"
                                value="{{ !empty($data) ? $data->id_pegawai : '' }}">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div><div class="mb-3">
                            <label for="id_jabatan" class="form-label fw-bold">Peran</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="id_jabatan" name="id_jabatan"
                                    placeholder="Masukan Peran"
                                    value="{{ !empty($data) ? $data->id_jabatan : '' }}">
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                            </div><div class="mb-3">
                                <label for="id_satker" class="form-label fw-bold">Unit Kerja</label>
                                <div class="d-flex flex-row gap-2">
                                    <input required type="text" class="form-control w-50" id="id_satker" name="id_satker"
                                        placeholder="Masukan Unit Kerja"
                                        value="{{ !empty($data) ? $data->id_satker : '' }}">
                                    <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                                </div><div class="mb-3">
                                    <label for="handphone" class="form-label fw-bold">Handphone</label>
                                    <div class="d-flex flex-row gap-2">
                                        <input required type="text" class="form-control w-50" id="handphone" name="handphone"
                                            placeholder="Masukan Nomor Handphone"
                                            value="{{ !empty($data) ? $data->handphone : '' }}">
                                        <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                                    </div>
                    </div>

                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                    <input type="submit" value="Batal" class="btn btn-primary">

                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
