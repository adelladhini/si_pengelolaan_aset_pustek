@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item"><a href="{{ route('Daftar TemplateWA') }}">Daftar TemplateWA</a></li>
            </ol>
            <h4 class="main-title mb-0">{{ !empty($data) ? 'Edit' : 'Tambah' }} TemplateWA</h4>
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
                <form id="FormEditTemplateWA" method="POST" enctype="multipart/form-data"
                    action="{{ !empty($data) ? route('Edit TemplateWA', $data->id) : route('Tambah TemplateWA') }}">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{ !empty($data) ? $data->id : '' }}" />
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-bold">Judul</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control w-50" id="judul" name="judul"
                                placeholder="Masukan Judul"
                                value="{{ !empty($data) ? $data->judul: '' }}">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div><div class="mb-3">
                        <label for="isi" class="form-label fw-bold">Isi</label>
                         <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control w-50" id="isi" name="isi"
                                placeholder="Masukan isi"
                                value="{{ !empty($data) ? $data->isi: '' }}">
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
