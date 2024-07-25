<div>
    @if (session()->has('deletesuccess'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('deletesuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('successSimpanLoket'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('successSimpanLoket') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4 class="d-inline">Pendaftaran</h4>

        <div style="float: right;">
            <a href="/pendaftaran/loket" class="d-inline-block btn btn-success mb-3 " style="margin-right:5px;">
                Lihat Pendaftaran Loket</a>
            <button class="d-inline-block float-end btn btn-info mb-3 " data-bs-toggle="modal"
                data-bs-target="#modalPasien" wire:click.prevent="tambah()">Tambah</button>
        </div>


    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12"><input wire:model.live="search" type="text" class="form-control mb-3"
                placeholder="Cari pasien..."></div>
    </div>



    <div class="modal" id="modalPasien" tabindex="-1" aria-labelledby="modalPasienLabel1" aria-hidden="true"
        style="display: {{ $isOpen ? 'block' : 'none' }};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPasienLabel1">
                        {{ $selectedId ? 'Ubah Pendaftaran' : 'Tambah Pendaftaran' }}
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
                        @if ($kode_pasien)
                            <div class="mb-3">
                                <label for="kode_pasien" class="form-label">Kode Pasien</label>
                                <input type="text" class="form-control" id="kode_pasien" wire:model="kode_pasien"
                                    readonly>
                                @error('kode_pasien')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" wire:model="nik">
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" wire:model="nama_pasien">
                            @error('nama_pasien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" wire:model="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <select class="form-control" id="golongan_darah" wire:model="golongan_darah">
                                <option value="">Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                            @error('golongan_darah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir"
                                wire:model="tanggal_lahir">
                            @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($umur)
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="text" class="form-control" id="umur" wire:model="umur"
                                    readonly>
                                @error('umur')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" wire:model="alamat"></textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pasien" class="form-label">Jenis Pasien</label>
                            <select class="form-control" id="jenis_pasien" wire:model="jenis_pasien">
                                <option value="">Pilih Jenis Pasien</option>
                                <option value="Umum">Umum</option>
                                <option value="BPJS">BPJS</option>
                            </select>
                            @error('jenis_pasien')
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

    <div class="modal" id="deletePasien" tabindex="-1" aria-labelledby="deletePasienLabel1" aria-hidden="true"
        style="display: {{ $isOpenDelete ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deletePasienLabel1">
                        Hapus Data Pasien
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data an. <strong>{{ $nama_pasien }}</strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:click="delete('{{ $selectedId }}')"
                        data-bs-dismiss="modal">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalPoli" tabindex="-1" aria-labelledby="modalPoliLabel1" aria-hidden="true"
        style="display: {{ $isOpenPoli ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPoliLabel1">
                        Tambahkan ke Poli
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    <select class="form-select" wire:model="poli">
                        <option value="">Pilih Poli</option>
                        @foreach ($daftarPoli as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:click="simapanLoket('{{ $selectedId }}')"
                        data-bs-dismiss="modal">Tambah</button>
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
                    <th>Kode Pasien</th>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Golongan Darah</th>
                    <th>Daftar Ke Poli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $key => $pasien)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pasien->kode_pasien }}</td>
                        <td>{{ $pasien->nik }}</td>
                        <td>{{ $pasien->nama_pasien }}</td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>{{ $pasien->umur }}</td>
                        <td>{{ $pasien->golongan_darah }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPoli"
                                wire:click.prevent="poliShow('{{ $pasien->id }}')">DAFTARKAN
                                POLI</button>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalPasien" wire:click.prevent="edit('{{ $pasien->id }}')"><i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deletePasien"
                                wire:click.prevent="deleteshow('{{ $pasien->id }}')"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pasiens->links() }}
    </div>
</div>
