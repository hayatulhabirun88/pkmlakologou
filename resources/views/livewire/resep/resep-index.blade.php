<div>
    @if (session()->has('deletesuccess'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('deletesuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4 class="d-inline">Resep</h4>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12"><input wire:model.live="search" type="text" class="form-control mb-3"
                placeholder="Cari ..."></div>
    </div>



    <div class="modal" id="modalResep" tabindex="-1" aria-labelledby="modalResepLabel1" aria-hidden="true"
        style="display: {{ $isOpen ? 'block' : 'none' }};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPasienLabel1">
                        Daftar Resep
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>

                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Jumlah Obat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($daftarObat as $dobat)
                            <tr>
                                <td>{{ $dobat->obat->kode_obat }}</td>
                                <td>{{ $dobat->obat->nama_obat }}</td>
                                <td>{{ $dobat->obat->satuan }}</td>
                                <td>{{ $dobat->jumlah_obat }}</td>
                                <td>{{ $dobat->status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success"
                                        wire:click.prevent="diambil('{{ $dobat->id }}')">Diambil</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click.prevent="batal('{{ $dobat->id }}')">Batal</button>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tblDokter" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Berobat</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Pasien</th>
                    <th>Poli</th>
                    <th>NIP</th>
                    <th>Dokter</th>
                    <th>Spesialis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resep as $key => $r)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $r->tgl_berobat }}</td>
                        <td>{{ $r->pasien->nama_pasien }}</td>
                        <td>{{ $r->pasien->jenis_kelamin }}</td>
                        <td>{{ $r->pasien->jenis_pasien }}</td>
                        <td>{{ $r->poli->nama_poli }}</td>
                        <td>{{ $r->dokter->nip }}</td>
                        <td>{{ $r->dokter->nama_dokter }}</td>
                        <td>{{ $r->dokter->spesialis }}</td>
                        {{-- <td>{{ $r->resep->status }}</td> --}}
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalResep"
                                wire:click.prevent="edit('{{ $r->id }}')"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resep->links() }}
    </div>
</div>
