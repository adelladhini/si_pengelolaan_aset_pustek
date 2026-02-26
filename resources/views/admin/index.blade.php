@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold mb-1">Dashboard Aset</h4>
    <p class="text-muted">Monitoring data aset tablet Pustekinfo</p>
</div>

<div class="row g-4">

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted mb-1">Total Pegawai</p>
                    <h3 class="fw-bold">{{ $totalPegawai }}</h3>
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
                    <h3 class="fw-bold">{{ $totalAset }}</h3>
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
                    <h3 class="fw-bold">{{ $asetTerpakai }}</h3>
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
                    <h3 class="fw-bold">{{ $asetBelumTerpakai }}</h3>
                </div>
                <div class="bg-danger bg-opacity-10 p-3 rounded-3">
                    <i class="ri-close-circle-line fs-28 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection