@extends('layouts.app')

@section('content')

{{-- ================================
NOTIF PEGAWAI AKAN PENSIUN
================================ --}}
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
<p class="text-muted">Monitoring data aset tablet Pustekinfo</p>
</div>


{{-- ================================
CARD STATISTIK
================================ --}}

<div class="row g-4">

<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Total Pegawai</p>
<h3 class="fw-bold">{{ $totalPegawai ?? 0 }}</h3>
</div>
<div class="bg-primary bg-opacity-10 p-3 rounded-3">
<i class="ri-user-3-line fs-28 text-primary"></i>
</div>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Total Aset</p>
<h3 class="fw-bold">{{ $totalAset ?? 0 }}</h3>
</div>
<div class="bg-success bg-opacity-10 p-3 rounded-3">
<i class="ri-tablet-line fs-28 text-success"></i>
</div>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Aset Terpakai</p>
<h3 class="fw-bold">{{ $asetTerpakai ?? 0 }}</h3>
</div>
<div class="bg-warning bg-opacity-10 p-3 rounded-3">
<i class="ri-checkbox-circle-line fs-28 text-warning"></i>
</div>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Belum Terpakai</p>
<h3 class="fw-bold">{{ $asetBelum ?? 0 }}</h3>
</div>
<div class="bg-danger bg-opacity-10 p-3 rounded-3">
<i class="ri-close-circle-line fs-28 text-danger"></i>
</div>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Pegawai Memegang Tablet</p>
<h3 class="fw-bold">{{ $pegawaiMemegangTablet ?? 0 }}</h3>
</div>
<div class="bg-info bg-opacity-10 p-3 rounded-3">
<i class="ri-tablet-line fs-28 text-info"></i>
</div>
</div>
</div>
</div>


<div class="col-12 col-sm-6 col-xl-3">
<div class="card shadow-sm border-0 rounded-4 h-100">
<div class="card-body d-flex align-items-center justify-content-between">
<div>
<p class="text-muted mb-1">Aset Rusak</p>
<h3 class="fw-bold">{{ $asetRusak ?? 0 }}</h3>
</div>
<div class="bg-danger bg-opacity-10 p-3 rounded-3">
<i class="ri-error-warning-line fs-28 text-danger"></i>
</div>
</div>
</div>
</div>

</div>



{{-- ================================
GRAFIK
================================ --}}

<div class="row g-4 mt-1">

<div class="col-lg-6">

<div class="card shadow-sm border-0 rounded-4">
<div class="card-body">

<h5 class="mb-3">Grafik Kondisi Aset</h5>

<div style="height:260px;">
<canvas id="asetChart"></canvas>
</div>

</div>
</div>

</div>


<div class="col-lg-6">

<div class="card shadow-sm border-0 rounded-4">
<div class="card-body">

<h5 class="mb-3">Grafik Peminjaman Tablet</h5>

<div style="height:260px;">
<canvas id="peminjamanChart"></canvas>
</div>

</div>
</div>

</div>

</div>



{{-- ================================
TRANSAKSI TERBARU
================================ --}}

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

<td>{{ $item->aset->kode_aset ?? '-' }}</td>

<td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>

<td>

@if($item->tanggal_kembali)
<span class="badge bg-success">Dikembalikan</span>
@else
<span class="badge bg-warning text-dark">Dipinjam</span>
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

const ctx = document.getElementById('asetChart');

new Chart(ctx,{
type:'doughnut',
data:{
labels:['Baik','Rusak Ringan','Rusak Berat'],
datasets:[{
label:'Jumlah Aset',
data:[
{{ $asetBaik ?? 0 }},
{{ $asetRusakRingan ?? 0 }},
{{ $asetRusakBerat ?? 0 }}
],
backgroundColor:[
'#22c55e',
'#f59e0b',
'#ef4444'
],
borderWidth:2
}]
},
options:{
responsive:true,
maintainAspectRatio:false,
plugins:{
legend:{
position:'bottom'
}
}
}
});



const peminjaman = document.getElementById('peminjamanChart');

const labelsPeminjaman = @json(array_keys(($peminjamanBulanan ?? collect())->toArray()));
const dataPeminjaman = @json(array_values(($peminjamanBulanan ?? collect())->toArray()));

new Chart(peminjaman,{
type:'bar',
data:{
labels: labelsPeminjaman.length ? labelsPeminjaman : ['Belum Ada Data'],
datasets:[{
label:'Jumlah Peminjaman',
data: dataPeminjaman.length ? dataPeminjaman : [0],
backgroundColor:'#3b82f6',
borderRadius:8,
barPercentage:0.5,
categoryPercentage:0.6,
maxBarThickness:40
}]
},
options:{
responsive:true,
maintainAspectRatio:false,
plugins:{
legend:{display:true}
},
scales:{
x:{
grid:{display:false}
},
y:{
beginAtZero:true,
ticks:{stepSize:1}
}
}
}
});

</script>

@endsection