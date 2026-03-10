@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Data Pegawai</h4>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">
            + Tambah Pegawai
        </a>
    </div>

    <!-- FILTER -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('pegawai.index') }}">
                <div class="row">

                    <!-- Search -->
<div class="input-group" style="max-width: 400px;">
    
    <!-- Icon Search -->
    <span class="input-group-text bg-white">
        <i class="bi bi-search"></i>
    </span>

    <!-- Input -->
    <input type="text" 
           name="search" 
           id="searchInput"
           class="form-control border-start-0 border-end-0" 
           placeholder="Cari NIP / Nama...">

    <!-- Tombol Clear -->
    <button type="button" 
            class="input-group-text bg-white border-start-0"
            onclick="clearSearch()"
            style="cursor:pointer;">
        <i class="bi bi-x-lg"></i>
    </button>

</div>

                    <!-- Filter Satker -->
                    <div class="col-md-3">
                        <select name="satker_id" class="form-select">
                            <option value="">-- Semua Satuan Kerja --</option>
                            @foreach($satker as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('satker_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_satker }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-success btn-sm">Filter</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Satuan Kerja</th>
                        <th>TMT Pensiun</th>
                        <th width="120">Status</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pegawai as $item)
                    <tr>
                        <td class="text-center">
                            {{ $pegawai->firstItem() + $loop->index }}
                        </td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->satker->nama_satker ?? '-' }}</td>
                        <td>{{ optional($item->tmt_pensiun)->format('d-m-Y') ?? '-' }}</td>

                        <!-- STATUS -->
                        <td class="text-center">
                            {!! $item->status_badge !!}
                        </td>

                        <!-- AKSI -->
                    <td class="text-center">

    <!-- EDIT -->
    <a href="{{ route('pegawai.edit', $item->id) }}"
       class="btn btn-warning btn-sm">
        Edit
    </a>

<!-- HAPUS DATA -->
<form action="{{ route('pegawai.destroy', $item->id) }}"
      method="POST"
      class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus pegawai ini? Data tidak bisa dikembalikan.')">
        Hapus
    </button>
</form>

    <!-- RESET PASSWORD -->
    <form action="{{ route('pegawai.reset', $item->id) }}"
          method="POST"
          class="d-inline">
        @csrf
        <button class="btn btn-secondary btn-sm"
                onclick="return confirm('Reset password pegawai ini?')">
            Reset PW
        </button>
    </form>

</td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Belum ada data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

    <div class="mt-3">
        {{ $pegawai->withQueryString()->links() }}
    </div>

</div>

@endsection