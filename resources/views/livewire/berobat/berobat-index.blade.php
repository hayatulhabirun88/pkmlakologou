<div>
    @if (session()->has('deletesuccess'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('deletesuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4 class="d-inline">Berobat</h4>
        <div style="float: right;">
            <button class="d-inline-block float-end btn btn-info mb-3" data-bs-toggle="modal"
                data-bs-target="#modalBerobat" wire:click.prevent="tambah()">Tambah</button>
        </div>
    </div>

    <!-- Modal Berobat -->
    <div class="modal" id="modalBerobat" tabindex="-1" aria-labelledby="modalBerobatLabel1" aria-hidden="true"
        style="display: {{ $isOpen ? 'block' : 'none' }};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPasienLabel1">
                        {{ $selectedId ? 'Ubah Data Berobat' : 'Tambah Data Berobat' }}
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
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="kodePasien" class="form-label">Kode Pasien</label>
                                    <input type="text" class="form-control" id="kodePasien" name="kodePasien"
                                        wire:model.live="kodePasien">
                                    @error('kodePasien')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($status_pencarian)
                                        <span class="text-danger">{{ $status_pencarian }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" wire:model="nik" readonly>
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" wire:model="jenis_kelamin" readonly>
                                    @error('jenis_kelamin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="dokter_id" class="form-label">Dokter</label>
                                    <select name="doker_id" class="form-control" id="dokter_id" wire:model="dokter_id">
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id }}">
                                                {{ $dokter->nip }}-{{ $dokter->nama_dokter }}</option>
                                        @endforeach
                                    </select>
                                    @error('dokter_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control" id="nama_pasien" wire:model="nama_pasien"
                                        readonly>
                                    @error('nama_pasien')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_pasien" class="form-label">Jenis Pasien</label>
                                    <input type="text" class="form-control" wire:model="jenis_pasien" readonly>
                                    @error('jenis_pasien')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pengirim" class="form-label">Pengirim</label>
                                    <input type="text" class="form-control" id="pengirim" wire:model="pengirim">
                                    @error('pengirim')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="poli_id" class="form-label">Poli</label>
                                    <select name="poli_id" id="poli_id" class="form-control" wire:model="poli_id">
                                        <option value="">Pilih Poli</option>
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}">
                                                {{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>
                                    @error('poli_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="no_ruangan" class="form-label">No Ruangan</label>
                                    <input type="text" class="form-control" id="no_ruangan"
                                        wire:model="no_ruangan">
                                    @error('no_ruangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <textarea name="diagnosa" class="form-control" id="diagnosa" wire:model="diagnosa" cols="30" rows="5"></textarea>
                            @error('diagnosa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                            <textarea name="tindak_lanjut" class="form-control" id="tindak_lanjut" wire:model="tindak_lanjut" cols="30"
                                rows="5"></textarea>
                            @error('tindak_lanjut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="row">
                            <div class="col-7">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($obat_pasien)
                                            @foreach ($obat_pasien as $obatp)
                                                <tr>
                                                    <td>{{ $obatp['kode_obat'] }}</td>
                                                    <td>{{ $obatp['nama_obat'] }}</td>
                                                    <td>{{ $obatp['satuan'] }}</td>
                                                    <td>{{ $obatp['jumlah_obat'] }}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm"
                                                            wire:click.prevent="hapusDataObat('{{ $obatp['kode_obat'] }}')">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Cari Obat"
                                    wire:model.live="search">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($daftarObat)
                                            @foreach ($daftarObat as $dobat)
                                                <tr>
                                                    <td>{{ $dobat->kode_obat }}</td>
                                                    <td>{{ $dobat->nama_obat }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            wire:click.prevent="tambahObat('{{ $dobat->id }}')">Add</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <button class="btn btn-danger" wire:click.prevent="hapusObat()">Reset</button>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="{{ $selectedId ? 'update' : 'save' }}">{{ $selectedId ? 'Ubah' : 'Tambah' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal" id="deleteBerobat" tabindex="-1" aria-labelledby="deleteBerobatLabel1" aria-hidden="true"
        style="display: {{ $isOpenDelete ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteBerobatLabel1">
                        Hapus Data Pasien
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin akan menghapus data an. <strong>{{ $nama_pasien }}</strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="delete('{{ $selectedId }}')" data-bs-dismiss="modal">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Berobat -->
    <div class="table-responsive">
        <table id="tblDokter" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Berobat</th>
                    <th>Kode Pasien</th>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Pasien</th>
                    <th>Diagnosa</th>
                    <th>Tindak Lanjut</th>
                    <th>No Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berobats as $key => $berobat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $berobat->tgl_berobat }}</td>
                        <td>{{ $berobat->pasien->kode_pasien }}</td>
                        <td>{{ $berobat->pasien->nik }}</td>
                        <td>{{ $berobat->pasien->nama_pasien }}</td>
                        <td>{{ $berobat->pasien->jenis_pasien }}</td>
                        <td>{{ $berobat->diagnosa }}</td>
                        <td>{{ $berobat->tindak_lanjut }}</td>
                        <td>{{ $berobat->no_ruangan }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalBerobat" wire:click.prevent="edit('{{ $berobat->id }}')"><i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteBerobat"
                                wire:click.prevent="deleteshow('{{ $berobat->id }}')"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $berobats->links() }}
    </div>
</div>
