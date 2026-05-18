@extends('layouts.app')

@section('content')

<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Detail Transaksi Aset</h4>
        <p class="text-muted mb-0">Informasi peminjaman aset</p>
    </div>

    <a href="{{ route('transaksi-aset.index') }}" class="btn btn-secondary btn-sm">
        <i class="ri-arrow-left-line"></i> Kembali
    </a>
</div>

{{-- ================================
INFORMASI TRANSAKSI
================================ --}}
<div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-body">
        <div class="row g-3">

            {{-- PEGAWAI --}}
            <div class="col-md-6">
                <small class="text-muted">Nama Pegawai</small>
                <div class="fw-semibold">{{ $transaksi->pegawai->nama }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">NIP</small>
                <div class="fw-semibold">{{ $transaksi->pegawai->nip }}</div>
            </div>

            {{-- ASET --}}
            <div class="col-md-6">
                <small class="text-muted">Kode BMN</small>
                <div class="fw-semibold">{{ $transaksi->aset->kode_bmn }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Nama Aset</small>
                <div class="fw-semibold">{{ $transaksi->aset->tipe }}</div>
            </div>

            {{-- TANGGAL --}}
            <div class="col-md-6">
                <small class="text-muted">Tanggal Pinjam</small>
                <div class="fw-semibold">
                    {{ \Carbon\Carbon::parse($transaksi->tanggal_pinjam)->format('d M Y') }}
                </div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Tanggal Kembali</small>
                <div class="fw-semibold">
                    {{ $transaksi->tanggal_kembali 
                        ? \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d M Y') 
                        : '-' }}
                </div>
            </div>

            {{-- KONDISI --}}
            <div class="col-md-6">
                <small class="text-muted">Kondisi Awal</small>
                <div class="fw-semibold">{{ $transaksi->kondisi_awal }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Kondisi Kembali</small>
                <div class="fw-semibold">
                    {{ $transaksi->kondisi_kembali ?? '-' }}
                </div>
            </div>

            {{-- 🔥 ALASAN --}}
            <div class="col-md-6">
                <small class="text-muted">Alasan Pengembalian</small>
                <div>
                    @if($transaksi->alasan_pengembalian)
                        <span class="badge bg-light text-dark px-3 py-2">
                            {{ $transaksi->alasan_pengembalian }}
                        </span>
                    @else
                        -
                    @endif
                </div>
            </div>

            {{-- 🔥 STATUS (SINKRON + LINK) --}}
            <div class="col-md-6">
                <small class="text-muted">Status</small>
                <div>

                    @if(is_null($transaksi->tanggal_kembali))
                        <a href="{{ route('transaksi-aset.index', ['status' => 'Dipinjam']) }}">
                            <span class="badge-custom badge-ringan">
                                Dipinjam
                            </span>
                        </a>
                    @else
                        <a href="{{ route('transaksi-aset.index', ['status' => 'Dikembalikan']) }}">
                            <span class="badge-custom badge-baik">
                                Dikembalikan
                            </span>
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>

{{-- ================================
BUKTI FILE
================================ --}}
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">

        <h6 class="fw-bold mb-3">Bukti Transaksi</h6>

        <div class="row">

            {{-- BUKTI PINJAM --}}
            <div class="col-md-6 mb-3">
                <small class="text-muted">Bukti Peminjaman</small><br>
                @if($transaksi->bukti_peminjaman)
                    <a href="{{ asset('storage/'.$transaksi->bukti_peminjaman) }}" 
                       target="_blank"
                       class="btn btn-sm btn-primary mt-1">
                        <i class="bi bi-file-earmark-arrow-up"></i> Lihat File
                    </a>
                @else
                    <div>-</div>
                @endif
            </div>

            {{-- BUKTI KEMBALI --}}
            <div class="col-md-6 mb-3">
                <small class="text-muted">Bukti Pengembalian</small><br>
                @if($transaksi->bukti_pengembalian)
                    <a href="{{ asset('storage/'.$transaksi->bukti_pengembalian) }}" 
                       target="_blank"
                       class="btn btn-sm btn-success mt-1">
                        <i class="bi bi-file-earmark-check"></i> Lihat File
                    </a>
                @else
                    <div>-</div>
                @endif
            </div>

        </div>

    </div>
</div>

@endsection