<?php

namespace App\Livewire\Obat;

use App\Models\Obat;
use App\Models\ObatMasuk;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiObatMasuk extends Component
{
    use WithPagination;
    public function render()
    {
        $obat = ObatMasuk::paginate(10);
        return view('livewire.obat.transaksi-obat-masuk', compact(['obat']));
    }
}
