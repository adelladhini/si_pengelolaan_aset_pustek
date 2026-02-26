


<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#WebsiteModal">...
</button>

<!-- Modal -->
<div class="modal fade" id="WebsiteModal" tabindex="-1" aria-labelledby="WebsiteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="WebsiteModalLabel">Daftar Website</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table id="tableGrid3">
                <thead>
                    <th>Nama Website</th>
                    <th>URL</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getWebsites() as $website)
                    <tr>
                        <td>{{ $website->nama_website }}</td>
                        <td>{{ $website->url }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="selectFieldsWebsite('{{ $website->id }}', '{{ $website->nama_website }}', '{{ $website->variant }}', '{{ $website->template }}')">
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


{{-- <style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        max-width: 80%;
        max-height: 80%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>



    <input type="button" value="..." class="btn btn-primary" id="openModalButton">
    
    <div class="modal" id="modalContainer">
        <div class="modal-content">
            <input type="button" value="X" class="btn btn-danger" id="closeModalButton">
            <h2 class="text-xl font-semibold mb-4">Daftar Website</h2>
            <div class="container" style="max-height: 400px; overflow-y: auto;">
            <table id="tableGrid3">
                <thead>
                    <th>ID</th>
                    <th>Nama Website</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getWebsites() as $website)
                    <tr>
                        <td>{{ $website->id }}</td>
                        <td>{{ $website->nama_website }}</td>
                       
                        <td>
                            <button class="btn btn-primary" onclick="selectFields1('{{ $website->id }}', '{{ $website->nama_website }}')">PILIH</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>


    <td>
        <button type="button" class="btn btn-success" wire:click="selectWebsite({{ $website->id }})">Pilih</button>
    </td>

<script>
    $(document).ready(function () {
        $("#openModalButton").click(function () {
            $("#modalContainer").fadeIn();
        });

        $("#closeModalButton").click(function () {
            $("#modalContainer").fadeOut();
        });
    });
</script> --}}
