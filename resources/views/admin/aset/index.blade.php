@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Data Aset</h4>

        <a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm">
            + Tambah Aset
        </a>
    </div>

<!-- SEARCH -->
<div class="card mb-3">
    <div class="card-body">

        <form method="GET" action="{{ route('aset.index') }}">
            <div class="row">

                <div class="col-md-4">
                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                               name="search"
                               id="searchInput"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Cari kode / nama aset..."
                               onkeyup="toggleClearButton()">

                        <button type="button"
                                id="clearBtn"
                                class="input-group-text bg-white"
                                onclick="clearSearch()"
                                style="cursor:pointer; display:none;">
                            <i class="bi bi-x-lg"></i>
                        </button>

                    </div>
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