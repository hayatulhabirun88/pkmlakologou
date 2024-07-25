<?php

namespace App\Livewire\Resep;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\Berobat;
use Livewire\Component;
use Livewire\WithPagination;

class ResepIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $berobat_id, $obat_id, $jumlah_obat, $status, $kode_obat, $nama_obat, $tgl_expire, $stok, $qty, $satuan, $keterangan, $tgl_berobat, $nama_pasien, $jenis_kelamin, $jenis_pasien, $poli, $dokter, $nip, $spesialis, $lokasi_obat_id, $selectedId;
    public $isOpen = false;
    public $daftarObat = array();

    protected $updatesQueryString = ['search'];
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedDaftarObat()
    {
        if ($this->selectedId) {
            $this->daftarObat = Resep::where('berobat_id', $this->selectedId)->get();
        }
    }

    public function edit($id)
    {
        $this->isOpen = true;

        $resep = Berobat::findOrFail($id);
        $this->selectedId = $resep->id;
        $this->daftarObat = Resep::where('berobat_id', $resep->id)->get();

    }

    public function diambil($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->status = 'Diambil';
        $resep->save();
        $this->daftarObat = Resep::where('berobat_id', $this->selectedId)->get();

        session()->flash('success', 'Data Berhasil Update.');

    }

    public function batal($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->status = 'Diresepkan';
        $resep->save();
        $this->daftarObat = Resep::where('berobat_id', $this->selectedId)->get();

        session()->flash('success', 'Data Berhasil Update.');

    }

    public function render()
    {
        $query = Berobat::with('pasien')
            ->whereHas('pasien', function ($query) {
                $query->where('nama_pasien', 'like', '%' . $this->search . '%');
            });

        $resep = $query->latest()->paginate(10);
        return view('livewire.resep.resep-index', compact('resep'));
    }
}
