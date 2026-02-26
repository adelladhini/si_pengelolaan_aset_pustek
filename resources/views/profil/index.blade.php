@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                {{-- <li class="breadcrumb-item"><a href="#">Menu</a></li> --}}
                <li class="breadcrumb-item">Profil</li>
                <li class="breadcrumb-item"><a href="{{ asset('') }}">Beranda</a></li>
            </ol>
            <h4 class="main-title mb-0">View Profil</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3">

                <form>

                    <div class="mb-3">
                        <label for="image_name" class="form-label">Foto Profil</label>
                        <br>
                        <img class="mb-3 border rounded-circle " src="{{ asset(auth()->user()->foto) }}" alt="Foto Profil"
                            style="height: 100px; width: 100px;">

                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control " id="nama" name="nama"
                                    value="{{ auth()->user()->nama }}" placeholder="Masukan Nama" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control " id="email" name="email"
                                    value="{{ auth()->user()->email }}" placeholder="Masukan Email" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control " id="jabatan" name="jabatan"
                                    value="{{ auth()->user()->jabatan }}" placeholder="Masukan Jabatan" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="lembaga" class="form-label">Lembaga</label>
                                <input type="text" class="form-control " id="lembaga" name="lembaga"
                                    value="{{ auth()->user()->lembaga }}" placeholder="Masukan Lembaga" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" disabled name="deskripsi" id="deskripsi" cols="30" rows="8">{{ auth()->user()->deskripsi }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="cv" class="form-label">Riwayat Hidup</label>
                                <br>
                                <iframe src="{{ asset(auth()->user()->cv) }}" width="100%" height="500"></iframe>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
