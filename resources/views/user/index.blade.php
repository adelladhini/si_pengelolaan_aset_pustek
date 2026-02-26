@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <div>
    <ol class="breadcrumb fs-sm mb-1">
      <li class="breadcrumb-item"><a href="#">Dashboard User</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sekretariat Jendral DPR RI</li>
    </ol>
    <h4 class="main-title mb-0">Welcome to Dashboard</h4>
  </div>

  <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
    <button type="button" class="btn btn-white btn-icon"><i class="ri-share-line fs-18 lh-1"></i></button>
    <button type="button" class="btn btn-white btn-icon"><i class="ri-printer-line fs-18 lh-1"></i></button>
    <button type="button" class="btn btn-primary d-flex align-items-center gap-2"><i class="ri-bar-chart-2-line fs-18 lh-1"></i>Generate<span class="d-none d-sm-inline"> Report</span></button>
  </div>
</div>

<div class="row g-3">
  <div class="col-12 col-sm-6 col-xl">
    <div class="card card-one">
      <div class="card-body p-3">
        <div class="mb-1 text-primary ti--3"><i class="ri-rocket-line fs-48 lh-1"></i></div>
        <h6 class="fw-semibold text-dark mb-1">Applications</h6>
        <p class="fs-xs text-secondary"><span class="ff-numerals">6,320</span> Files</p>
        <div class="progress ht-3 mb-1">
          <div class="progress-bar w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between ff-numerals fs-xs fw-medium">
          <span>26.5GB</span>
          <span>50GB</span>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->
  <div class="col-6 col-sm-6 col-xl">
    <div class="card card-one">
      <div class="card-body p-3">
        <div class="mb-1 text-primary ti--3"><i class="ri-file-text-line fs-48 lh-1"></i></div>
        <h6 class="fw-semibold text-dark mb-1">Documents</h6>
        <p class="fs-xs text-secondary"><span class="ff-numerals">4,067</span> Files</p>
        <div class="progress ht-3 mb-1">
          <div class="progress-bar w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between ff-numerals fs-xs fw-medium">
          <span>8.8GB</span>
          <span>20GB</span>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->
  <div class="col-6 col-sm-4 col-xl">
    <div class="card card-one">
      <div class="card-body p-3">
        <div class="mb-1 text-primary ti--3"><i class="ri-gallery-line fs-48 lh-1"></i></div>
        <h6 class="fw-semibold text-dark mb-1">Media</h6>
        <p class="fs-xs text-secondary"><span class="ff-numerals">1,983</span> Files</p>
        <div class="progress ht-3 mb-1">
          <div class="progress-bar w-70 bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between ff-numerals fs-xs fw-medium">
          <span>29.5GB</span>
          <span>40GB</span>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->
  <div class="col-6 col-sm-4 col-xl">
    <div class="card card-one">
      <div class="card-body p-3">
        <div class="mb-1 text-primary ti--3"><i class="ri-folder-zip-line fs-48 lh-1"></i></div>
        <h6 class="fw-semibold text-dark mb-1">Archives</h6>
        <p class="fs-xs text-secondary"><span class="ff-numerals">3,508</span> Files</p>
        <div class="progress ht-3 mb-1">
          <div class="progress-bar w-85 bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between ff-numerals fs-xs fw-medium">
          <span>26.6GB</span>
          <span>30GB</span>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->
  <div class="col-6 col-sm-4 col-xl">
    <div class="card card-one">
      <div class="card-body p-3">
        <div class="mb-1 text-primary ti--3"><i class="ri-folder-2-line fs-48 lh-1"></i></div>
        <h6 class="fw-semibold text-dark mb-1">Others</h6>
        <p class="fs-xs text-secondary"><span class="ff-numerals">845</span> Files</p>
        <div class="progress ht-3 mb-1">
          <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between ff-numerals fs-xs fw-medium">
          <span>5.1GB</span>
          <span>10GB</span>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->


  <div class="col-12">
    <div class="card card-one">
      <div class="card-header">
        <h6 class="card-title">Storage Distribution</h6>
        <nav class="nav nav-icon nav-icon-sm ms-auto">
          <a href="" class="nav-link"><i class="ri-refresh-line"></i></a>
          <a href="" class="nav-link"><i class="ri-more-2-fill"></i></a>
        </nav>
      </div><!-- card-header -->
      <div class="card-body p-3 p-xl-4">
        <div class="row g-4">
          <div class="col-xl-8">
            <div id="apexChart3" class="apex-chart-eleven"></div>
          </div>
          <div class="col-xl">
            <div class="d-flex">
              <i class="ri-drive-fill fs-48 lh-1 me-3 text-primary"></i>
              <div>
                <h6 class="fw-semibold text-dark mb-1">Google Drive</h6>
                <p class="fs-sm text-secondary mb-0">Google Drive is a file storage and synchronization service that allows users to store files in the cloud, synchronize files across devices, and share files.</p>
              </div>
            </div>
            <div class="d-flex mt-3">
              <i class="ri-dropbox-fill fs-48 lh-1 me-3 text-primary"></i>
              <div>
                <h6 class="fw-semibold text-dark mb-1">Dropbox</h6>
                <p class="fs-sm text-secondary mb-0">Dropbox is a file hosting service that offers cloud storage, file synchronization, personal cloud, and client software.</p>
              </div>
            </div>
            <div class="d-flex mt-3">
              <i class="ri-cloud-fill fs-48 lh-1 me-3 text-primary"></i>
              <div>
                <h6 class="fw-semibold text-dark mb-1">iCloud</h6>
                <p class="fs-sm text-secondary mb-0">iCloud helps you keep your most important information like photos, files, etc., and available across all your devices.</p>
              </div>
            </div>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- col -->
</div><!-- row -->

@endsection