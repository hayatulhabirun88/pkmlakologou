<?php

namespace App\Livewire\Obat;

use App\Models\Obat;
use App\Models\ObatMasuk;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiObatMasuk extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->isOpen = false;
        $this->isOpenDelete = false;
        $this->resetPage();
    }

    public function render()
    {
        $query = ObatMasuk::query()
            ->with('obat');

        if ($this->search !== null) {
            $query->whereHas('obat', function ($q) {
                $q->where('nama_obat', 'like', '%' . $this->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_obat', 'like', '%' . $this->search . '%');
            });
        }

        $obat = $query->latest()->paginate(10);
        return view('livewire.obat.transaksi-obat-masuk', compact(['obat']));
    }
}
