<div>
    @if (session()->has('deletesuccess'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('deletesuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4 class="d-inline">Obat</h4>

        <div style="float: right;">
            <div class="row">
                <div class="col-md-6"><button type="submit" class="d-inline-block float-end btn btn-success mb-3 "
                        data-bs-toggle="modal" data-bs-target="#modalImportObat" wire:click.prevent="showImport()">
                        Import </button></div>
                <div class="col-md-6"><button class="d-inline-block float-end btn btn-info mb-3 " data-bs-toggle="modal"
                        data-bs-target="#modalObat" wire:click.prevent="tambah()">Tambah</button></div>

            </div>


        </div>

    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12"><input wire:model.live="search" type="text" class="form-control mb-3"
                placeholder="Cari obat..."></div>
    </div>



    <div class="modal" id="modalObat" tabindex="-1" aria-labelledby="modalObatLabel1" aria-hidden="true"
        style="display: {{ $isOpen ? 'block' : 'none' }};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPasienLabel1">
                        {{ $selectedId ? 'Ubah Data Obat' : 'Tambah Data Obat' }}
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form>
                        @if ($kode_obat)
                            <div class="mb-3">
                                <label for="kode_obat" class="form-label">Kode Obat</label>
                                <input type="text" class="form-control" id="kode_obat" wire:model="kode_obat"
                                    readonly>
                                @error('kode_obat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" wire:model="nama_obat">
                            @error('nama_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_expire" class="form-label">Tanggal Expire</label>
                            <input type="date" class="form-control" id="tgl_expire" wire:model="tgl_expire">
                            @error('tgl_expire')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" wire:model="stok">
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" wire:model="satuan">
                            @error('satuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" wire:model="keterangan"></textarea>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_obat_id" class="form-label">Lokasi Obat</label>
                            <select name="lokasi_obat_id" class="form-control" id="lokasi_obat_id"
                                wire:model="lokasi_obat_id">
                                <option value="">Pilih Lokasi Obat</option>
                                @foreach ($lokasiObats as $lokasiObat)
                                    <option value="{{ $lokasiObat->id }}">
                                        {{ $lokasiObat->kode_rak . '-' . $lokasiObat->tempat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lokasi_obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"
                        wire:click.prevent="{{ $selectedId ? 'update' : 'save' }}">{{ $selectedId ? 'Ubah' : 'Tambah' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalImportObat" tabindex="-1" aria-labelledby="modalImportObatLabel1"
        aria-hidden="true" style="display: {{ $isOpenImportObat ? 'block' : 'none' }};">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPasienLabel1">
                        {{ $selectedId ? 'Ubah Data Obat' : 'Import Data Obat' }}
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form wire:submit.prevent="import">
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Masukan file Excel Data Obat</label>
                            <input type="file" class="form-control" id="nama_obat" wire:model="file">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import Data
                        Obat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteObat" tabindex="-1" aria-labelledby="deleteObatLabel1" aria-hidden="true"
        style="display: {{ $isOpenDelete ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteObatLabel1">
                        Hapus Data Obat
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data an. <strong>{{ $nama_obat }}</strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:click="delete('{{ $selectedId }}')"
                        data-bs-dismiss="modal">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tblDokter" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Tanggal Expire</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Lokasi Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $key => $obat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $obat->kode_obat }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->tgl_expire }}</td>
                        <td>{{ $obat->stok }}</td>
                        <td>{{ $obat->satuan }}</td>
                        <td>{{ $obat->keterangan }}</td>
                        <td>{{ @$obat->lokasi_obat->kode_rak . '' . @$obat->lokasi_obat->tempat }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalObat"
                                wire:click.prevent="edit('{{ $obat->id }}')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteObat"
                                wire:click.prevent="deleteshow('{{ $obat->id }}')"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $obats->links() }}
    </div>
</div>
