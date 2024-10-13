<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label" for="cari_obat">Cari Obat</label>
                    <input class="form-control" id="cari_obat" type="text" placeholder="Cari Obat"
                        wire:model.live="search">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $item)
                                <tr>
                                    <td>{{ $item->kode_obat }}</td>
                                    <td>{{ $item->nama_obat }}</td>
                                    <td>{{ $item->stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $obats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
