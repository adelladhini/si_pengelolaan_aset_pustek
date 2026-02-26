@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item"><a href="{{ route('Daftar Usulan') }}">Daftar Usulan</a></li>
            </ol>
            <h4 class="main-title mb-0">{{ !empty($data) ? 'Edit' : 'Tambah' }} Usulan</h4>
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

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="mb-3">
                <form id="FormEditUsulan" method="POST" enctype="multipart/form-data"
                    action="{{ !empty($data) ? route('Edit Usulan', $data->id) : route('Tambah Usulan') }}">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{ !empty($data) ? $data->id : '' }}" />
                    <div class="mb-3">
                        <label for="id_satker" class="form-label fw-bold">Pengusul</label>
                        <div class="d-flex flex-row gap-2">
                            <select class="form-control w-50" id="dropdown" name="id_satker" required>
                                <option value="" disabled selected hidden>-- Pilih Data --</option>
                                @foreach ($satkerOptions as $option)
                                    <option value="{{ $option->id }}" @if (!empty($data) && $data->id_satker == $option->id) selected @endif>
                                        {{ $option->nama_satker }}</option>
                                @endforeach
                            </select>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>

                        <label for="judul" class="form-label fw-bold">Judul</label>
                        <div class="d-flex flex-row gap-2">
                            <textarea required class="form-control w-50" id="judul" name="judul" rows="5"
                                placeholder="Masukan Pertanyaan">{{ !empty($data) ? $data->judul : '' }}</textarea>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>

                        <label for="jenis" class="form-label fw-bold">Jenis</label>
                        <div class="d-flex flex-row gap-2">
                            <select class="form-control w-50" id="dropdown" name="jenis" required>
                                <option value="" disabled selected hidden>-- Pilih Data --</option>
                                @foreach ($jenisOptions as $option)
                                    <option value="{{ $option->id }}" @if (!empty($data) && $data->id == $option->id) selected @endif>
                                        {{ $option->jenis }}</option>
                                @endforeach
                            </select>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>

                        <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                        <div class="d-flex flex-row gap-2">
                            <textarea required class="form-control w-50" id="keterangan" name="keterangan" rows="5"
                                placeholder="Masukan Pertanyaan">{{ !empty($data) ? $data->keterangan : '' }}</textarea>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>


                        <!-- <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="date" class="form-control w-50" id="tanggal" name="tanggal"
                                placeholder="Masukan DD-MM-YYYY"
                                {{-- value="{{ !empty($data) ? $data->tanggal : '' }}"> --}}
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                        <div class="mb-3">
                            <label for="id_satker" class="form-label fw-bold">Pengusul</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="id_satker" name="id_satker"
                                    placeholder="Masukan Bagian Pengusul"
                                    {{-- value="{{ !empty($data) ? $data->id_satker : '' }}"> --}}
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                        
                        <div class="mb-3">
                            <label for="id_jenis" class="form-label fw-bold">Jenis</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="id_jenis" name="id_jenis"
                                    placeholder="Masukan Jenis Sk"
                                    {{-- value="{{ !empty($data) ? $data->id_jenis : '' }}"> --}}
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div><div class="mb-3">
                            <label for="judul" class="form-label fw-bold">Judul</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="judul" name="judul"
                                    placeholder="Masukan Judul"
                                    {{-- value="{{ !empty($data) ? $data->judul : '' }}"> --}}
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div><div class="mb-3">
                            <label for="status_pelaku" class="form-label fw-bold">Status</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="status_pelaku" name="status_pelaku"
                                    placeholder="Masukan Status"
                                    {{-- value="{{ !empty($data) ? $data->status : '' }}"> --}}
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div><div class="mb-3">
                            <label for="status_prioritas" class="form-label fw-bold">Prioritas</label>
                            <div class="d-flex flex-row gap-2">
                                <input required type="text" class="form-control w-50" id="status_prioritas" name="status_prioritas"
                                    placeholder="Masukan Status Prioritas"
                                    {{-- value="{{ !empty($data) ? $data->id_jabatan : '' }}"> --}}
                                <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div> -->
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <input type="submit" value="Batal" class="btn btn-primary">

                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
