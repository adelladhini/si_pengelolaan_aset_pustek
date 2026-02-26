


<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#WebsiteMenuModal">...
</button>

<!-- Modal -->
<div class="modal fade" id="WebsiteMenuModal" tabindex="-1" aria-labelledby="WebsiteMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="WebsiteMenuModalLabel">Daftar Menu Website</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table id="tableGrid3">
                <thead>
                    <th>Sub Judul</th>
                    <th>Menu</th>
                    <th>Type</th>
                    <th>Param</th>
                    <th>Parent</th>
                    <th>Urutan</th>
                    <th>Icon</th>
                    <th>Icon color</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($this->getWebsiteMenus() as $website_menu)
                    <tr>
                      <td>{{ $website_menu->sub_judul }}</td>
                        <td>
                        @if ($website_menu->menu)
                            {{ $website_menu->menu->judul }}
                        @endif
                        </td>
                        <td>{{ $website_menu->type }}</td>
                        <td>{{ $website_menu->param }}</td>
                        <td>{{ $website_menu->parent }}</td>
                        <td>{{ $website_menu->urutan }}</td>
                        <td>{!! $website_menu->icon !!}</td>
                        <td><div style="color: {{ $website_menu->icon_color }};">
                            {{ $website_menu->icon_color }}
                        </div> 
                        </td>
                        <td>{{ $website_menu->deskripsi }}</td>
                        
                        <td>
                            <button type="button" class="btn btn-primary" onclick="selectFieldsWebsiteMenu('{{ $website_menu->id }}', '{{ $website_menu->type }}')"><i class="ri-navigation-fill"></i> Pilih</button>
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