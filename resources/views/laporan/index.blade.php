@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Laporan Aset</h4>

        <a href="{{ route('laporan.aset.export') }}" class="btn btn-primary">
            <i class="fas fa-file-export"></i> Export CSV
        </a>
    </div>

    <!-- FILTER -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.aset') }}">
                <div class="row">

                    <div class="col-12 col-md-3">
                        <label>Dari Tanggal</label>
                        <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label>Status</label>
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
            <div class="card card-dipinjam">
                <div class="card-body">
                    <h6>Total Dipinjam</h6>
                    <h3>
                        {{ $data->where('status','Dipinjam')->count() }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- DIKEMBALIKAN -->
        <div class="col-md-6">
            <div class="card card-dikembalikan">
                <div class="card-body">
                    <h6>Total Dikembalikan</h6>
                    <h3>
                        {{ $data->where('status','Dikembalikan')->count() }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Aset</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $i => $row)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $row->pegawai->nama ?? '-' }}</td>
                        <td>{{ $row->aset->nama ?? '-' }}</td>
                        <td>{{ $row->tanggal_pinjam }}</td>
                        <td>{{ $row->tanggal_kembali ?? '-' }}</td>
                        <td>
                            @if($row->status == 'Dipinjam')
                                <span class="badge badge-dipakai">Dipinjam</span>
                            @else
                                <span class="badge badge-tersedia">Dikembalikan</span>
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