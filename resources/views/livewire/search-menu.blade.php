


<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MenuModal">...
</button>

<!-- Modal -->
<div class="modal fade" id="MenuModal" tabindex="-1" aria-labelledby="MenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="MenuModalLabel">Daftar Menu </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table id="tableGrid3">
                <thead>
                    <th>Judul</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getMenus() as $menu)
                    <tr>
                        
                        <td>{{ $menu->judul }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="selectFieldsMenu('{{ $menu->id }}', '{{ $menu->judul }}')"><i class="ri-navigation-fill"></i> Pilih</button>
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
