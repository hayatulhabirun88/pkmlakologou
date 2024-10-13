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
                                <th>Waktu Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $item)
                                <tr>
                                    <td>{{ $item->obat->kode_obat }}</td>
                                    <td>{{ $item->obat->nama_obat }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
