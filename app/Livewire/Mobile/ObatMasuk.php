<?php

namespace App\Livewire\Mobile;

use App\Models\Obat;
use Livewire\Component;
use Livewire\WithPagination;

class ObatMasuk extends Component
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

    public function render()
    {
        $query = Obat::query();

        if ($this->search !== null) {
            $query->where('kode_obat', 'like', '%' . $this->search . '%')
                ->orWhere('nama_obat', 'like', '%' . $this->search . '%');
        }

        $obat = $query->latest()->paginate(5);

        return view('livewire.mobile.obat-masuk', compact(['obat']));
    }
}
