@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
            </ol>
            <h4 class="main-title mb-0">Edit Menu</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').remove();
                    }, 3000);
                </script>
            @endif
            <div class="mb-3">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="menu" class="form-label fw-bold">Menu</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control w-50" id="menu" name="menu"
                                placeholder="Masukan menu" value="{{ $menu->menu }}">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status-sileg" class="form-label fw-bold">Status SILEG</label>
                        <div style="width: 100%;">
                            <input type="checkbox" class="form-check-input" id="status-sileg"
                                onclick="updateStatusSileg()">
                        </div>
                        <input type="hidden" name="status_sileg" id="status-sileg-hidden" value="0">
                    </div>

                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function updateStatusSileg() {
            var checkbox = document.getElementById('status-sileg');
            var hiddenInput = document.getElementById('status-sileg-hidden');

            hiddenInput.value = checkbox.checked ? 1 : 0;
        }
    </script>
@endpush

