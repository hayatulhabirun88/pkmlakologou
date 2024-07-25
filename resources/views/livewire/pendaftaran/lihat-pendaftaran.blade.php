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
        <a href="/pendaftaran" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="modal" id="deleteLoket" tabindex="-1" aria-labelledby="deleteLoketLabel1" aria-hidden="true"
        style="display: {{ $isOpenDelete ? 'block' : 'none' }};">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteLoketLabel1">
                        Hapus Data Loket
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

    <div class="table-responsive">
        <table id="tblDokter" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Daftar</th>
                    <th>Kode Layanan</th>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Poli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loketlayanan as $key => $loket)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $loket->tgl_daftar }}</td>
                        <td>{{ $loket->kode_layanan }}</td>
                        <td>{{ $loket->pasien->nik }}</td>
                        <td>{{ $loket->pasien->nama_pasien }}</td>
                        <td>{{ $loket->pasien->jenis_kelamin }}</td>
                        <td>{{ $loket->poli->nama_poli }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteLoket"
                                wire:click.prevent="deleteshow('{{ $loket->id }}', '{{ $loket->pasien->nama_pasien }}')"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $loketlayanan->links() }}
    </div>
</div>
