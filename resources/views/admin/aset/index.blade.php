@extends('layouts.app')

@section('content')

<style>

/* FILTER BAR */
.filter-bar{
    background: #f8f9fa;
    border-radius: 10px;
}

/* SEARCH */
.filter-bar .form-control{
    border-radius: 8px;
}

/* SELECT */
.filter-bar .form-select{
    border-radius: 8px;
}

/* BUTTON FILTER */
.filter-bar .btn-success{
    background: #1abc9c;
    border: none;
}

.filter-bar .btn-success:hover{
    background: #16a085;
}

</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Data Aset</h4>

        <a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm">
            + Tambah Aset
        </a>
    </div>

<!-- FILTER -->
<div class="card mb-3 filter-bar">
    <div class="card-body">

        <form method="GET" action="{{ route('aset.index') }}">
            <div class="row align-items-center">

                <!-- SEARCH -->
                <div class="col-md-4">
                    <div class="input-group">

                        <!-- ICON SEARCH -->
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <!-- INPUT -->
                        <input type="text"
                               name="search"
                               id="searchInput"
                               class="form-control"
                               placeholder="Cari Kode / Nama Aset..."
                               value="{{ request('search') }}"
                               onkeyup="toggleClearButton()">

                        <!-- CLEAR -->
                        <button type="button"
                                id="clearBtn"
                                class="input-group-text bg-white"
                                onclick="clearSearch()"
                                style="cursor:pointer; display:none;">
                            <i class="bi bi-x-lg"></i>
                        </button>

                    </div>
                </div>

                <!-- FILTER STATUS -->
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="Tersedia" {{ request('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Digunakan" {{ request('status') == 'Digunakan' ? 'selected' : '' }}>Digunakan</option>
                        <option value="Perbaikan" {{ request('status') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    </select>
                </div>

                <!-- BUTTON -->
                <div class="col-md-3">
                    <button class="btn btn-success btn-sm">Filter</button>
                    <a href="{{ route('aset.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                </div>

            </div>
        </form>

    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif


<div class="card">
    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light text-center">
                <tr>
                    <th width="60">No</th>
                    <th>Kode BMN</th>
                    <th>Nama Aset</th>
                    <th>Serial Number</th>
                    <th>IMEI</th>
                    <th>Tahun</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                    <th>Pegawai</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($aset as $item)

                <tr>

                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_bmn }}</td>

                    <td>{{ $item->nama_aset }}</td>

                    <td>{{ $item->serial_number }}</td>

                    <td>{{ $item->imei }}</td>

                    <td>{{ $item->tahun_pengadaan }}</td>

                    <td class="text-center">

                        @if($item->kondisi == 'Baik')
                            <span class="badge bg-success">Baik</span>
                        @elseif($item->kondisi == 'Rusak Ringan')
                            <span class="badge bg-warning">Rusak Ringan</span>
                        @else
                            <span class="badge bg-danger">Rusak Berat</span>
                        @endif

                    </td>

                    <td class="text-center">

                        @if($item->status == 'Tersedia')
                            <span class="badge bg-primary">Tersedia</span>
                        @elseif($item->status == 'Digunakan')
                            <span class="badge bg-success">Digunakan</span>
                        @else
                            <span class="badge bg-warning">Perbaikan</span>
                        @endif

                    </td>

                    <td>
                        {{ $item->pegawai->nama ?? '-' }}
                    </td>

                    <td class="text-center">

                        <a href="{{ route('aset.edit', $item->id) }}"
                           class="btn btn-warning btn-sm me-1"
                           title="Edit Aset">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('aset.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    title="Hapus Aset"
                                    onclick="return confirm('Hapus aset ini?')">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="10" class="text-center">
                        Belum ada data aset
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

</div>


<script>

function toggleClearButton() {
    let input = document.getElementById("searchInput");
    let clearBtn = document.getElementById("clearBtn");

    if (input.value.length > 0) {
        clearBtn.style.display = "block";
    } else {
        clearBtn.style.display = "none";
    }
}

function clearSearch() {
    let input = document.getElementById("searchInput");
    input.value = "";
    document.getElementById("clearBtn").style.display = "none";
    window.location = "{{ route('aset.index') }}";
}

document.addEventListener("DOMContentLoaded", function(){
    toggleClearButton();
});

</script>

@endsection