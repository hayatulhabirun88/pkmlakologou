<?php

namespace App\Livewire\Obat;

use App\Models\Obat;
use Livewire\Component;
use App\Models\LokasiObat;
use Livewire\WithPagination;

class ObatIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $kode_obat, $nama_obat, $tgl_expire, $stok, $qty, $satuan, $keterangan, $lokasi_obat_id, $selectedId;
    public $isOpen = false;
    public $isOpenDelete = false;
    protected $updatesQueryString = ['search'];
    public $search = '';

    public function updatingSearch()
    {
        $this->isOpen = false;
        $this->isOpenDelete = false;
        $this->resetPage();
    }

    public function tambah()
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;
        $this->selectedId = null;
    }


    private function resetInputFields()
    {
        $this->nama_obat = '';
        $this->tgl_expire = '';
        $this->stok = '';
        $this->satuan = '';
        $this->keterangan = '';
        $this->lokasi_obat_id = '';
    }

    public function save()
    {
        $this->validate([
            'nama_obat' => 'required|string',
            'tgl_expire' => 'required|date',
            'stok' => 'required|integer',
            'satuan' => 'required|string',
            'keterangan' => 'required|string',
            'lokasi_obat_id' => 'required|integer',
        ]);

        Obat::create([
            'kode_obat' => rand(100000000000000000, 999999999999999999),
            'nama_obat' => $this->nama_obat,
            'tgl_expire' => $this->tgl_expire,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'keterangan' => $this->keterangan,
            'lokasi_obat_id' => $this->lokasi_obat_id,
        ]);

        session()->flash('success', 'Data Obat ' . $this->nama_obat . '  Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $obat = Obat::findOrFail($id);
        $this->selectedId = $id;
        $this->kode_obat = $obat->kode_obat;
        $this->nama_obat = $obat->nama_obat;
        $this->tgl_expire = $obat->tgl_expire;
        $this->stok = $obat->stok;
        $this->satuan = $obat->satuan;
        $this->keterangan = $obat->keterangan;
        $this->lokasi_obat_id = $obat->lokasi_obat_id;
    }


    public function update()
    {
        $validate = $this->validate([
            'nama_obat' => 'required|string',
            'tgl_expire' => 'required',
            'stok' => 'required',
            'satuan' => 'required|string',
            'keterangan' => 'required|string',
            'lokasi_obat_id' => 'required',
        ]);

        Obat::findOrFail($this->selectedId)->update([
            'nama_obat' => $this->nama_obat,
            'tgl_expire' => $this->tgl_expire,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'keterangan' => $this->keterangan,
            'lokasi_obat_id' => $this->lokasi_obat_id,
        ]);

        session()->flash('success', 'Data Pasien an. ' . $this->nama_obat . '  Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $obat = Obat::findOrFail($id);
        $this->nama_obat = $obat->nama_obat;
    }

    public function delete($id)
    {
        $pasien = Obat::findOrFail($id);
        $pasien->delete();
        session()->flash('deletesuccess', 'Data Pasien berhasil dihapus!');
        $this->isOpenDelete = false;
    }

    public function render()
    {
        $query = Obat::query();

        if ($this->search !== null) {
            $query->where('nama_obat', 'like', '%' . $this->search . '%')
                ->orWhere('keterangan', 'like', '%' . $this->search . '%');
        }

        $obats = $query->latest()->paginate(10);

        $lokasiObats = LokasiObat::all();
        return view('livewire.obat.obat-index', compact(['obats', 'lokasiObats']));
    }
}
