<div>
    @if (session()->has('deletesuccess'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('deletesuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="d-inline">Dokter</h4>
    <button class="d-inline float-end btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#modalDokter"
        wire:click.prevent="tambah()">Tambah</button>

    <div class="modal" id="modalDokter" tabindex="-1" aria-labelledby="modalDokterLabel1" aria-hidden="true"
        style="display: {{ $isOpen ? 'block' : 'none' }};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDokterLabel1">
                        {{ $selectedId ? 'Ubah Data Dokter' : 'Tambah Data Dokter' }}
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
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" wire:model="nip">
                            @error('nip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama_dokter" wire:model="nama_dokter">
                            @error('nama_dokter')
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
                            <label for="no_telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" wire:model="no_telp">
                            @error('no_telp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" wire:model="alamat"></textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="spesialis" class="form-label">Spesialis</label>
                            <input type="text" class="form-control" id="spesialis" wire:model="spesialis">
                            @error('spesialis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" wire:model="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" wire:model="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi
                                        Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        wire:model="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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

    <div class="modal" id="deleteDokter" tabindex="-1" aria-labelledby="deleteDokterLabel1" aria-hidden="true"
        style="display: {{ $isOpenDelete ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteDokterLabel1">
                        Hapus Data Dokter
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data an. <strong>{{ $nama_dokter }}</strong> ?
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
                    <th>NIP</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $key => $dokter)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $dokter->nip }}</td>
                        <td>{{ $dokter->nama_dokter }}</td>
                        <td>{{ $dokter->spesialis }}</td>
                        <td>{{ $dokter->jenis_kelamin }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalDokter" wire:click.prevent="edit('{{ $dokter->id }}')"><i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteDokter"
                                wire:click.prevent="deleteshow('{{ $dokter->id }}')"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dokters->links() }}
    </div>
</div>
