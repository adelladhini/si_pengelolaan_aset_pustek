<div class="modal fade" id="modalKembalikan{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('transaksi-aset.kembalikan', $item->id) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <div class="modal-content rounded-4 border-0 shadow">

                {{-- HEADER --}}
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold">
                        Pengembalian Tablet
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                {{-- BODY --}}
                <div class="modal-body">

                    {{-- TANGGAL KEMBALI --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" 
                               name="tanggal_kembali" 
                               class="form-control @error('tanggal_kembali') is-invalid @enderror"
                               value="{{ old('tanggal_kembali', date('Y-m-d')) }}">

                        @error('tanggal_kembali')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- KONDISI --}}
                    <div class="mb-3">
                        <label class="form-label">Kondisi Saat Dikembalikan</label>
                        <select name="kondisi_kembali" 
                            class="form-select @error('kondisi_kembali') is-invalid @enderror">

                            <option value="">-- Pilih Kondisi --</option>
                            <option value="Baik" {{ old('kondisi_kembali')=='Baik'?'selected':'' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi_kembali')=='Rusak Ringan'?'selected':'' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi_kembali')=='Rusak Berat'?'selected':'' }}>Rusak Berat</option>
                            <option value="Hilang" {{ old('kondisi_kembali')=='Hilang'?'selected':'' }}>Hilang</option>
                        </select>

                        @error('kondisi_kembali')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- UPLOAD --}}
                    <div class="mb-2">
                        <label class="form-label">Upload Bukti Pengembalian</label>
                        <input type="file" 
                               name="bukti_pengembalian"
                               class="form-control @error('bukti_pengembalian') is-invalid @enderror"
                               accept="image/*,application/pdf">

                        @error('bukti_pengembalian')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <small class="text-muted">
                        Format: JPG / PNG / PDF (max 2MB)
                    </small>

                </div>

                {{-- FOOTER --}}
                <div class="modal-footer">
                    <button type="button" 
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" 
                            class="btn btn-success">
                        <i class="ri-checkbox-circle-line"></i>
                        Selesaikan Pengembalian
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('#modalKembalikan{{ $item->id }} form');
    if (!form) return;

    const fields = form.querySelectorAll('select, input');

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

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(
            document.getElementById('modalKembalikan{{ $item->id }}')
        );
        modal.show();
    });
</script>
@endif