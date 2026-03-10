@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Data Jabatan</h4>

    <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3">
        Tambah Jabatan
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_jabatan }}</td>
                <td>{{ $item->jenis_jabatan }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('jabatan.edit', $item->id) }}" 
                       class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('jabatan.destroy', $item->id) }}"
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection