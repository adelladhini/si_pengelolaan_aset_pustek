@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            {{-- <li class="breadcrumb-item"><a href="#">Menu</a></li> --}}
            <li class="breadcrumb-item">Profil</li>
            <li class="breadcrumb-item"><a href="{{ asset('') }}">Beranda</a></li>
        </ol>
        <h4 class="main-title mb-0">Sunting Profil</h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">

            <form action="{{ route('profil.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Profil</label>

                    @if (auth()->user()->foto)
                        <br>
                        <img class="mb-3 border rounded-circle " src="{{ asset(auth()->user()->foto) }}" alt="Foto Profil" style="height: 100px; width: 100px;">
                        <br>
                        <a href="{{ route('profil.deleteFile', ['id' => auth()->user()->id, 'jenis' => 'img']) }}" class="btn btn-danger"><i class="ri-delete-bin-line"></i> Hapus</a>
                    @else
                        <input type="file" class="form-control w-50" id="foto" name="foto" accept="image/*">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control w-50" id="nama" name="nama"
                        value="{{ auth()->user()->nama }}" placeholder="Masukan Nama" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control w-50" id="email" name="email"
                        value="{{ auth()->user()->email }}" placeholder="Masukan Email" >
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control w-50" id="jabatan" name="jabatan"
                        value="{{ auth()->user()->jabatan }}" placeholder="Masukan Jabatan" >
                </div>
                <div class="mb-3">
                    <label for="lembaga" class="form-label">Lembaga</label>
                    <input type="text" class="form-control w-50" id="lembaga" name="lembaga"
                        value="{{ auth()->user()->lembaga }}" placeholder="Masukan Lembaga" >
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control w-50"  name="deskripsi" id="deskripsi" cols="30" rows="3">{{ auth()->user()->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="cv" class="form-label">CV</label>

                        @if (auth()->user()->cv)
                            <br>
                            <a href="{{ asset(auth()->user()->cv) }}" target="_blank" class="btn btn-secondary mb-3"><i class="ri-file-line"></i> Tampilkan CV</a>
                            <br>
                            <a href="{{ route('profil.deleteFile', ['id' => auth()->user()->id, 'jenis' => 'pdf']) }}" class="btn btn-danger"><i class="ri-delete-bin-line"></i> Hapus</a>
                        @else
                        <input type="file" class="form-control w-50" id="cv" name="cv" accept="application/pdf">

                        @endif

                </div>

                <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
