<?php

namespace App\Livewire\Mobile;

use App\Models\Obat;
use Livewire\Component;
use App\Models\ObatMasuk;
use Livewire\WithPagination;

class ObatMasukIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = ['search'];

    public $search = '';

    public $tambahObatId, $kode_obat, $nama_obat, $stok;

    public $isOpenTambahObat = false;

    public function updatingSearch()
    {
        $this->isOpenTambahObat = false;
        $this->resetPage();
    }

    public function tambahObat($id)
    {
        $this->isOpenTambahObat = true;
        $this->resetTambahObat();
        $obat = Obat::findOrFail($id);
        $this->tambahObatId = $id;
        $this->kode_obat = $obat->kode_obat;
        $this->nama_obat = $obat->nama_obat;
    }

    public function resetTambahObat()
    {
        $this->tambahObatId = null;
        $this->kode_obat = null;
        $this->nama_obat = null;
        $this->stok = "";
    }

    public function simpanObat()
    {
        $this->validate([
            'kode_obat' => ['required', 'string', 'max:255'],
            'nama_obat' => ['required', 'string', 'max:255'],
            'stok' => ['required', 'integer'],
        ]);

        $obat = Obat::where('kode_obat', $this->kode_obat)->first();
        if ($obat) {
            $obat->update([
                'stok' => $obat->stok + $this->stok,
            ]);

            $obat_masuk = new ObatMasuk();
            $obat_masuk->obat_id = $obat->id;
            $obat_masuk->quantity = $this->stok;
            $obat_masuk->save();

        } else {
            $dataobat = Obat::create([
                'kode_obat' => $this->kode_obat,
                'nama_obat' => $this->nama_obat,
                'stok' => $this->stok,
                'lokasi_obat_id' => 1,
            ]);

            ObatMasuk::create([
                'obat_id' => $dataobat->id,
                'quantity' => $this->stok,
            ]);
        }

        session()->flash('success', "Stok obat berhasil di tambah");

        $this->resetTambahObat();
        $this->isOpenTambahObat = false;
    }

    public function render()
    {
        $query = Obat::query();

        if ($this->search !== null) {
            $query->where('kode_obat', 'like', '%' . $this->search . '%')
                ->orWhere('nama_obat', 'like', '%' . $this->search . '%');
        }

        $obat = $query->latest()->paginate(5);
        return view('livewire.mobile.obat-masuk-index', compact(['obat']));
    }
}
