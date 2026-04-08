@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Pengaturan Akun</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengaturan.akun.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NAMA --}}
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" 
                   class="form-control"
                   value="{{ auth()->user()->name }}" required>
        </div>

        {{-- USERNAME --}}
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" 
                   class="form-control"
                   value="{{ auth()->user()->username }}" required>
        </div>

        {{-- FOTO --}}
        <div class="mb-3">
            <label>Foto</label><br>

            @if(auth()->user()->foto)
                <img src="{{ asset('storage/' . auth()->user()->foto) }}" 
                     width="80" class="mb-2 rounded">
            @endif

            <input type="file" name="foto" class="form-control">
        </div>


{{-- PASSWORD --}}
<div class="mb-3">
    <label>Password Baru</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control">
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>

<div class="mb-3">
    <label>Konfirmasi Password</label>
    <div class="input-group">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    Simpan Perubahan
</button>
    </form>
</div>
@endsection