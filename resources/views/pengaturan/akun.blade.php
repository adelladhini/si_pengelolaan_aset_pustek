@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Pengaturan Akun</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengaturan.akun.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" 
                   class="form-control"
                   value="{{ auth()->user()->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection