@extends('layouts.app')

@section('content')

<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Detail Pegawai</h4>
        <p class="text-muted mb-0">Informasi pegawai dan tablet yang dipinjam</p>
    </div>

    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm">
        <i class="ri-arrow-left-line"></i> Kembali
    </a>
</div>

{{-- ================================
PROFIL PEGAWAI
================================ --}}

<div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-body">
        <div class="row g-3">

            {{-- IDENTITAS --}}
            <div class="col-md-6">
                <small class="text-muted">Nama Pegawai</small>
                <div class="fw-semibold">{{ $pegawai->nama }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">NIP</small>
                <div class="fw-semibold">{{ $pegawai->nip }}</div>
            </div>

            {{-- PEKERJAAN --}}
            <div class="col-md-6">
                <small class="text-muted">Jabatan</small>
                <div class="fw-semibold">{{ $pegawai->jabatan }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Unit Kerja</small>
                <div class="fw-semibold">{{ $pegawai->unit_kerja }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Gedung</small>
                <div class="fw-semibold">{{ $pegawai->gedung }}</div>
            </div>

            {{-- KONTAK --}}
            <div class="col-md-6">
                <small class="text-muted">No HP</small>
                <div class="fw-semibold">{{ $pegawai->no_hp }}</div>
            </div>

            <div class="col-md-6">
                <small class="text-muted">Email</small>
                <div class="fw-semibold">{{ $pegawai->email }}</div>
            </div>

            {{-- STATUS --}}
            <div class="col-md-6">
                <small class="text-muted">TMT Pensiun</small>
                <div class="fw-semibold">
                    {{ \Carbon\Carbon::parse($pegawai->tmt_pensiun)->format('d M Y') }}
                </div>
            </div>

        </div>
    </div>
</div>
<div class="accordion" id="accordionPeminjaman">

    {{-- ================= DIPINJAM ================= --}}
    <div class="accordion-item shadow-sm border-0 rounded-4 mb-3">

        <h2 class="accordion-header">
            <button class="accordion-button fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#dipinjam">
                <i class="bi bi-tablet me-2"></i> Tablet yang sedang Dipinjam
            </button>
        </h2>

        <div id="dipinjam" class="accordion-collapse collapse show">
            <div class="accordion-body p-3">

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-sm">

                        <thead class="table-light">
                            <tr>
                                <th>Kode BMN</th>
                                <th>Nama Aset</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Kondisi</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($transaksi as $item)
                            <tr>

                                <td class="fw-semibold">
                                    {{ $item->aset->kode_bmn }}
                                </td>

                                <td>
                                    {{ $item->aset->tipe }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $item->tanggal_kembali 
                                        ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') 
                                        : '-' }}
                                </td>

                                <td>
                                    @if(is_null($item->tanggal_kembali))
                                        {{ $item->kondisi_awal }}
                                    @else
                                        {{ $item->kondisi_kembali ?? '-' }}
                                    @endif
                                </td>

                                {{-- BUKTI --}}
                                <td class="text-center">
                                    @if($item->bukti_peminjaman)
                                        <a href="{{ asset('storage/'.$item->bukti_peminjaman) }}" 
                                        target="_blank" 
                                        class="btn btn-sm btn-primary px-2 py-1">
                                            <i class="bi bi-file-earmark-arrow-up"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">
                                    @if(is_null($item->tanggal_kembali))
                                        <span class="badge-custom badge-ringan">Dipinjam</span>
                                    @else
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">
                                    @if(is_null($item->tanggal_kembali))
                                        <button class="btn btn-success btn-sm px-2 py-1"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalKembalikan{{ $item->id }}">
                                            <i class="ri-checkbox-circle-line"></i>
                                        </button>
                                    @else
                                        <span class="badge bg-success">✔</span>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    Tidak ada tablet dipinjam
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>


    {{-- ================= RIWAYAT ================= --}}
    <div class="accordion-item shadow-sm border-0 rounded-4">

        <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#riwayat">
                <i class="bi bi-clock-history me-2"></i> Riwayat Peminjaman
            </button>
        </h2>

        <div id="riwayat" class="accordion-collapse collapse">
            <div class="accordion-body p-3">

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-sm">

                        <thead class="table-light">
                            <tr>
                                <th>Kode BMN</th>
                                <th>Nama Aset</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Kondisi</th>
                                <th>Bukti</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($riwayat as $item)
                            <tr>

                                <td class="fw-semibold">
                                    {{ $item->aset->kode_bmn }}
                                </td>

                                <td>
                                    {{ $item->aset->tipe }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $item->kondisi_kembali ?? '-' }}
                                </td>

                                {{-- BUKTI --}}
                                <td class="text-center">
                                    @if($item->bukti_pengembalian)
                                        <a href="{{ asset('storage/'.$item->bukti_pengembalian) }}" 
                                        target="_blank" 
                                        class="btn btn-sm btn-primary px-2 py-1">
                                            <i class="bi bi-file-earmark-check"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">
                                    <span class="badge bg-success">Dikembalikan</span>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada riwayat peminjaman
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@foreach($transaksi as $item)
    @include('transaksi_aset.pengembalian', ['item' => $item])
@endforeach

@endsection