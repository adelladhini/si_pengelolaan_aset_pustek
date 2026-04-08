@extends('layouts.app')

@section('content')

{{-- ================================ NOTIF ================================ --}}
@if(isset($notifPensiun) && $notifPensiun->count() > 0)
    <div class="alert alert-warning mb-4">
        <strong>⚠ Pegawai Akan Pensiun</strong>

        <ul class="mb-0 mt-2">
            @foreach($notifPensiun as $pegawai)
                <li>
                    <a href="{{ route('pegawai.show', $pegawai->id) }}" class="fw-semibold text-dark">
                        {{ $pegawai->nama }}
                    </a>
                    akan pensiun pada
                    <b>{{ \Carbon\Carbon::parse($pegawai->tmt_pensiun)->format('d M Y') }}</b>
                </li>
            @endforeach
        </ul>
    </div>
@endif


<div class="mb-4">
    <h4 class="fw-bold mb-1">Dashboard Aset</h4>
</div>


{{-- ================================ CARD ================================ --}}
<div class="row g-4">

@foreach([
    ['Total Pegawai', $totalPegawai ?? 0, 'primary', 'ri-user-3-line'],
    ['Total Aset', $totalAset ?? 0, 'success', 'ri-tablet-line'],
    ['Aset Terpakai', $asetTerpakai ?? 0, 'warning', 'ri-checkbox-circle-line'],
    ['Aset Belum Terpakai', $asetBelum ?? 0, 'danger', 'ri-close-circle-line'],
    ['Pegawai Memegang Tablet', $pegawaiMemegangTablet ?? 0, 'info', 'ri-tablet-line'],

] as [$title, $value, $color, $icon])

<div class="col-12 col-sm-6 col-xl-3">
    <div class="card card-dashboard shadow-sm border-0 rounded-4 h-100">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1">{{ $title }}</p>
                <h3 class="fw-bold">{{ $value }}</h3>
            </div>
            <div class="bg-{{ $color }} bg-opacity-10 p-3 rounded-3">
                <i class="{{ $icon }} fs-28 text-{{ $color }}"></i>
            </div>
        </div>
    </div>
</div>

@endforeach

{{-- ================================ GRAFIK ================================ --}}
<div class="row g-4 mt-1">

    {{-- GRAFIK KIRI --}}
    <div class="col-lg-6">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-body">
                <h5 class="mb-3">Grafik Kondisi Aset</h5>
                <div style="height:260px;">
                    <canvas id="asetChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- GRAFIK KANAN --}}
    <div class="col-lg-6">
        <div class="card shadow-sm border-0 rounded-4 h-100">

            <div class="card-body">

                {{-- HEADER + FILTER --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="mb-0">Grafik Peminjaman Tablet</h5>

                    <form method="GET" class="d-flex gap-2">
                        <select name="tahun" class="form-select form-select-sm">
                            @for($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>

                        <button class="btn btn-sm btn-primary">Filter</button>
                    </form>

                </div>

                <div style="height:260px;">
                    <canvas id="peminjamanChart"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>

{{-- ================================ TRANSAKSI ================================ --}}
<div class="row g-4 mt-2">
<div class="col-12">

<div class="card shadow-sm border-0 rounded-4">
<div class="card-body">

<h5 class="mb-3">Transaksi Tablet Terbaru</h5>

<div class="table-responsive">
<table class="table table-hover">

<thead>
<tr>
<th>Pegawai</th>
<th>Tablet</th>
<th>Tanggal Pinjam</th>
<th>Status</th>
</tr>
</thead>

<tbody>
@forelse($transaksiTerbaru as $item)
<tr>
<td>{{ $item->pegawai->nama ?? '-' }}</td>
<td>{{ $item->aset->kode_bmn ?? '-' }}</td>
<td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>

<td class="text-center">
@if($item->tanggal_kembali)
<span class="badge-custom badge-baik">Dikembalikan</span>
@else
<span class="badge-custom badge-ringan">Dipinjam</span>
@endif
</td>

</tr>
@empty
<tr>
<td colspan="4" class="text-center">Belum ada transaksi</td>
</tr>
@endforelse
</tbody>

</table>
</div>

</div>
</div>

</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ================= DOUGHNUT ================= */
const ctx = document.getElementById('asetChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang'],
        datasets: [{
            data: [
                {{ $asetBaik ?? 0 }},
                {{ $asetRusakRingan ?? 0 }},
                {{ $asetRusakBerat ?? 0 }},
                {{ $asetHilang ?? 0 }}
            ],
            backgroundColor: [
                '#067788', // Baik
                '#c2410c', // Ringan
                '#b91c1c', // Berat
                '#7f1d1d'  // Hilang
            ],
            borderWidth: 0,
            hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        animation: {
            animateScale: true,
            animateRotate: true,
            duration: 1000,
            easing: 'easeOutQuart'
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    padding: 15
                }
            },
            tooltip: {
                backgroundColor: '#073d5f',
                titleColor: '#fff',
                bodyColor: '#fff',
                callbacks: {
                    label: function(context) {
                        return context.label + ': ' + context.raw;
                    }
                }
            }
        }
    }
});


/* ================= BAR ================= */
const peminjaman = document.getElementById('peminjamanChart');

new Chart(peminjaman, {
    type: 'bar',
    data: {
        labels: @json($labels ?? []),
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: @json($data ?? []),
            backgroundColor: '#067788',
            hoverBackgroundColor: '#055e6a',
            borderColor: '#055e6a',
            borderWidth: 1,
            borderRadius: 10,
            barPercentage: 0.5,
            categoryPercentage: 0.6,
            maxBarThickness: 35
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            duration: 1000,
            easing: 'easeOutQuart'
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.05)'
                },
                ticks: {
                    precision: 0,
                    maxTicksLimit: 6
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: '#073d5f',
                titleColor: '#fff',
                bodyColor: '#fff'
            }
        }
    }
});
</script>

@endsection