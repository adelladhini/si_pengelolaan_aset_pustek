


<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#JenisDokumenModal">...
</button>

<!-- Modal -->
<div class="modal fade" id="JenisDokumenModal" tabindex="-1" aria-labelledby="JenisDokumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="JenisDokumenModalLabel">Daftar Jenis Dokumen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table id="tableGrid3">
                <thead>
                    <th>Jenis Dokumen</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getJenisDokumens() as $JenisDokumen)
                    <tr>
                        <td>{{ $JenisDokumen->jenis_dokumen }}</td>
                       
                        <td>
                            <button type="button" class="btn btn-primary" onclick="selectFieldsJenisDokumen('{{ $JenisDokumen->id }}', '{{ $JenisDokumen->jenis_dokumen }}')"><i class="ri-navigation-fill"></i> Pilih</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll("button");

            buttons.forEach(button => {
                button.type = "button";
            });
        });
</script>