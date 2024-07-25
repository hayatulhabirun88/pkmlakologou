<?php

namespace App\Livewire\Poli;

use App\Models\Poli;
use Livewire\Component;
use Livewire\WithPagination;

class PoliIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nama_poli, $selectedId;
    public $isOpen = false;
    public $isOpenDelete = false;

    public function tambah()
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;
        $this->selectedId = null;
    }


    private function resetInputFields()
    {
        $this->nama_poli = '';
    }

    public function save()
    {
        $this->validate([
            'nama_poli' => 'required|string',
        ]);

        Poli::create([
            'nama_poli' => $this->nama_poli,
        ]);

        session()->flash('success', 'Data  ' . $this->nama_poli . '  Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $poli = Poli::findOrFail($id);
        $this->selectedId = $id;
        $this->nama_poli = $poli->nama_poli;
    }


    public function update()
    {
        $this->validate([
            'nama_poli' => 'required|string',
        ]);

        Poli::findOrFail($this->selectedId)->update([
            'nama_poli' => $this->nama_poli,

        ]);

        session()->flash('success', 'Data ' . $this->nama_poli . '  Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $obat = Poli::findOrFail($id);
        $this->nama_poli = $obat->nama_poli;
    }

    public function delete($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();
        session()->flash('deletesuccess', 'Data Poli berhasil dihapus!');
        $this->isOpenDelete = false;
    }

    public function render()
    {
        $polis = Poli::latest()->paginate(10);
        return view('livewire.poli.poli-index', compact(['polis']));
    }
}
