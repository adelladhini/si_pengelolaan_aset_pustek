<table class="table">
    <thead>
        <tr>
            <th>Nama Aset</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $aset)
        <tr>
            <td>{{ $aset->tipe }}</td>

            <td>
                {{-- RESTORE --}}
                <form action="{{ route('aset.restore', $aset->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-success btn-sm">Restore</button>
                </form>

                {{-- HAPUS PERMANEN --}}
                <form action="{{ route('aset.forceDelete', $aset->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus Permanen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>