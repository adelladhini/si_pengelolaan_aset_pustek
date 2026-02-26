


<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserModal">...
</button>

<!-- Modal -->
<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="UserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UserModalLabel">Daftar User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table id="tableGrid3">
                <thead>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Lembaga</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getUsers() as $user)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td>{{ $user->lembaga }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="selectFieldsUser('{{ $user->id }}', '{{ $user->nama }}')">
                                <i class="ri-navigation-fill"></i> Pilih
                            </button>
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
