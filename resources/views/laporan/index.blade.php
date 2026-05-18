@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold">Laporan Aset</h4>

        <a href="{{ route('laporan.aset.export') }}" class="btn btn-primary">
            <i class="fas fa-file-export"></i> Export CSV
        </a>
    </div>

    <!-- FILTER -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.aset') }}">
                <div class="row">

                    <div class="col-12 col-md-3">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Semua</option>
                            <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                                Dipinjam
                            </option>
                            <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- SUMMARY -->
    <div class="row mb-4">

        <!-- DIPINJAM -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6>Total Dipinjam</h6>
                    <h3>
                        {{ $data->whereNull('tanggal_kembali')->count() }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- DIKEMBALIKAN -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6>Total Dikembalikan</h6>
                    <h3>
                        {{ $data->whereNotNull('tanggal_kembali')->count() }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $i => $row)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $row->pegawai->nama ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal_pinjam }}</td>
                        <td class="text-center">{{ $row->tanggal_kembali ?? '-' }}</td>

                        <!-- STATUS (SINKRON DENGAN TRANSAKSI) -->
                        <td class="text-center">
                            @if(is_null($row->tanggal_kembali))
                                <span class="badge-custom badge-ringan">Dipinjam</span>
                            @else
                                <span class="badge-custom badge-baik">Dikembalikan</span>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada data laporan
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection