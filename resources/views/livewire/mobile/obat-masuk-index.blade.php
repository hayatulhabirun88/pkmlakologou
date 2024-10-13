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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $item)
                                <tr>
                                    <td>{{ $item->kode_obat }}</td>
                                    <td>{{ $item->nama_obat }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>

                                        <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#modalTambahObat"
                                            wire:click.prevent="tambahObat('{{ $item->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20"
                                                height="20">
                                                <path
                                                    d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24 13 L 24 24 L 13 24 L 13 26 L 24 26 L 24 37 L 26 37 L 26 26 L 37 26 L 37 24 L 26 24 L 26 13 L 24 13 z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modalTambahObat" tabindex="-1" aria-labelledby="modalTambahObatLabel1" aria-hidden="true"
        style="display: {{ $isOpenTambahObat ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPoliLabel1">
                        Tambah Obat
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_obat" class="form-label">Kode Obat</label>
                        <input type="text" class="form-control" name="kode_obat" id="kode_obat"
                            aria-describedby="helpId" placeholder="Kode Obat" wire:model="kode_obat" />
                    </div>
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" id="nama_obat"
                            aria-describedby="helpId" placeholder="Nama Obat" wire:model="nama_obat" />
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Tambahan Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok"
                            aria-describedby="helpId" placeholder="Stok" wire:model="stok" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:click="simpanObat"
                        data-bs-dismiss="modal">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
