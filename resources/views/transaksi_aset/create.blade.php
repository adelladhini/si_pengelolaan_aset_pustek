@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">
        <h4 class="fw-bold mb-0">Tambah Transaksi Aset</h4>
        <p class="text-muted mb-0">Serahkan tablet kepada pegawai</p>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('transaksi-aset.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- PEGAWAI -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pegawai</label>
                        <select name="pegawai_id"
                            class="form-select @error('pegawai_id') is-invalid @enderror">

                            <option value="">-- Pilih Pegawai --</option>

                            @foreach($pegawai as $p)
                                <option value="{{ $p->id }}"
                                    {{ old('pegawai_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('pegawai_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TABLET -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tablet</label>
                        <select name="aset_id"
                            class="form-select @error('aset_id') is-invalid @enderror">

                            <option value="">-- Pilih Tablet --</option>

                            @foreach($aset as $a)
                                <option value="{{ $a->id }}"
                                    {{ old('aset_id') == $a->id ? 'selected' : '' }}>
                                    {{ $a->kode_bmn }} - {{ $a->tipe }}
                                </option>
                            @endforeach
                        </select>

                        @error('aset_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TANGGAL PINJAM -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Peminjaman</label>
                        <input type="date" 
                               name="tanggal_pinjam"
                               class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                               value="{{ old('tanggal_pinjam', date('Y-m-d')) }}">

                        @error('tanggal_pinjam')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- 🔥 BUKTI PEMINJAMAN -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Bukti Peminjaman</label>
                        <input type="file" 
                            name="bukti_peminjaman"
                            class="form-control @error('bukti_peminjaman') is-invalid @enderror"
                            accept="image/*,application/pdf">

                        @error('bukti_peminjaman')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <!-- ✅ PINDAH KE SINI -->
                        <small class="text-muted d-block mt-1">
                            Format: JPG / PNG / PDF (max 2MB)
                        </small>
                    </div>

                    <!-- KONDISI AWAL (dipindah ke bawah) -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kondisi Awal Tablet</label>
                        <input type="text" 
                               id="kondisi_awal"
                               class="form-control"
                               placeholder="Otomatis dari data aset"
                               readonly>
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between mt-3">

                <!-- KIRI -->
                <a href="{{ route('transaksi-aset.index') }}" class="btn btn-outline-secondary">
                    Kembali
                </a>

                <!-- KANAN -->
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

            </div>

            </form>

        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const asetData = @json($aset);
    const selectAset = document.querySelector('select[name="aset_id"]');
    const kondisiInput = document.getElementById('kondisi_awal');

    function setKondisi() {
        const selectedId = selectAset.value;
        const aset = asetData.find(a => a.id == selectedId);

        kondisiInput.value = aset ? aset.kondisi : '';
    }

    // AUTO ISI KONDISI
    selectAset.addEventListener('change', setKondisi);
    setKondisi();

    // HILANGKAN ERROR SAAT DIISI
    const fields = document.querySelectorAll('select, input');

    fields.forEach(field => {
        field.addEventListener('change', function () {
            if (this.value || (this.type === 'file' && this.files.length > 0)) {
                this.classList.remove('is-invalid');

                let errorText = this.parentElement.querySelector('.text-danger');
                if (errorText) {
                    errorText.style.display = 'none';
                }
            }
        });

        field.addEventListener('input', function () {
            if (this.value) {
                this.classList.remove('is-invalid');

                let errorText = this.parentElement.querySelector('.text-danger');
                if (errorText) {
                    errorText.style.display = 'none';
                }
            }
        });
    });

});
</script>

@endsection