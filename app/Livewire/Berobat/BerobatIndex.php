<?php

namespace App\Livewire\Berobat;

use App\Models\Obat;
use App\Models\Poli;
use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Berobat;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class BerobatIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nik, $tgl_berobat, $kodePasien, $nama_pasien, $diagnosa, $tindak_lanjut, $jenis_pasien, $jenis_kelamin, $no_ruangan, $pengirim, $kode_obat, $nama_obat, $satuan, $jumlah_obat, $status_pencarian, $dokter_id, $poli_id, $selectedId;
    public $isOpen = false;
    public $isOpenDelete = false;
    public $search = '';

    public $obat_pasien = [];

    public function updatedSearch()
    {
        $this->resetPage();

    }

    public function updatedKodePasien()
    {
        $pasien = Pasien::where('kode_pasien', str_replace(' ', '', $this->kodePasien))->first();
        if ($pasien) {
            $this->status_pencarian = '';
            $this->nik = $pasien->nik;
            $this->nama_pasien = $pasien->nama_pasien;
            $this->jenis_pasien = $pasien->jenis_pasien;
            $this->jenis_kelamin = $pasien->jenis_kelamin;
        } else {
            $this->status_pencarian = 'Pasien tidak ditemukan';
            $this->nik = '';
            $this->nama_pasien = '';
            $this->jenis_pasien = '';
            $this->jenis_kelamin = '';
        }
    }

    public function hapusDataObat($kodeObat)
    {
        $obatList = Session::get('obat_pasien', []);

        $filteredObatPasien = array_filter($obatList, function ($obat) use ($kodeObat) {
            return (int) $obat['kode_obat'] != (int) $kodeObat;
        });

        Session::put('obat_pasien', $filteredObatPasien);

        $this->obat_pasien = array_values($filteredObatPasien);
    }

    public function tambahObat($id)
    {
        $dataobat = Obat::find($id);

        if (!$dataobat) {
            session()->flash('error', 'Obat tidak ditemukan.');
            return;
        }

        $obat = [
            'kode_obat' => $dataobat->kode_obat,
            'nama_obat' => $dataobat->nama_obat,
            'satuan' => $dataobat->satuan,
            'jumlah_obat' => 1,
        ];

        $obatList = Session::get('obat_pasien', []);
        $existingObatKey = array_search($obat['kode_obat'], array_column($obatList, 'kode_obat'));

        if ($existingObatKey !== false) {
            $obatList[$existingObatKey]['jumlah_obat'] += 1;
        } else {
            $obatList[] = $obat;
        }

        Session::put('obat_pasien', $obatList);
        $this->obat_pasien = $obatList;
    }

    public function hapusObat()
    {
        Session::forget('obat_pasien');
        $this->obat_pasien = [];
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
        $this->dokter_id = '';
        $this->poli_id = '';
        $this->kodePasien = '';
        $this->nik = '';
        $this->nama_pasien = '';
        $this->jenis_kelamin = '';
        $this->jenis_pasien = '';
        $this->pengirim = '';
        $this->poli_id = '';
        $this->no_ruangan = '';
        $this->diagnosa = '';
        $this->tindak_lanjut = '';
        $this->obat_pasien = [];
        Session::forget('obat_pasien');
    }

    public function save()
    {
        $this->validate([
            'kodePasien' => 'required',
            'dokter_id' => 'required|numeric',
            'poli_id' => 'required|numeric',
            'no_ruangan' => 'required|numeric',
            'pengirim' => 'string',
            'diagnosa' => 'required|string',
            'tindak_lanjut' => 'required|string',
        ]);

        $pasien = Pasien::where('kode_pasien', $this->kodePasien)->first();

        $berobat = Berobat::create([
            'tgl_berobat' => date('Y-m-d H:i:s'),
            'dokter_id' => $this->dokter_id,
            'poli_id' => $this->poli_id,
            'pasien_id' => $pasien->id,
            'no_ruangan' => $this->no_ruangan,
            'pengirim' => $this->pengirim,
            'diagnosa' => $this->diagnosa,
            'tindak_lanjut' => $this->tindak_lanjut,
        ]);

        $obatList = Session::get('obat_pasien', []);
        foreach ($obatList as $obat) {
            $dataobat = Obat::where('kode_obat', $obat['kode_obat'])->first();
            Resep::create([
                'berobat_id' => $berobat->id,
                'obat_id' => $dataobat->id,
                'jumlah_obat' => $obat['jumlah_obat'],
                'status' => 'Diresepkan',
            ]);
        }

        session()->flash('success', 'Data Berobat Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $berobat = Berobat::findOrFail($id);
        $this->kodePasien = $berobat->pasien->kode_pasien;
        $this->nama_pasien = $berobat->pasien->nama_pasien;
        $this->nik = $berobat->pasien->nik;
        $this->jenis_kelamin = $berobat->pasien->jenis_kelamin;
        $this->jenis_pasien = $berobat->pasien->jenis_pasien;
        $this->selectedId = $berobat->id;
        $this->tgl_berobat = $berobat->tgl_berobat;
        $this->dokter_id = $berobat->dokter_id;
        $this->poli_id = $berobat->poli_id;
        $this->pasien_id = $berobat->pasien_id;
        $this->no_ruangan = $berobat->no_ruangan;
        $this->pengirim = $berobat->pengirim;
        $this->diagnosa = $berobat->diagnosa;
        $this->tindak_lanjut = $berobat->tindak_lanjut;


        $obat_pasien = Resep::where('berobat_id', $berobat->id)->get();
        $listObat = [];

        // Proses data untuk membentuk array
        foreach ($obat_pasien as $value) {
            $listObat[] = [
                'kode_obat' => $value->obat->kode_obat,
                'nama_obat' => $value->obat->nama_obat,
                'satuan' => $value->obat->satuan,
                'jumlah_obat' => $value->jumlah_obat,
            ];
        }

        // Simpan ke session
        Session::put('obat_pasien', $listObat);

        // Set property $this->obat_pasien
        $this->obat_pasien = $listObat;
    }

    public function update()
    {
        // Validasi data
        $this->validate([
            'kodePasien' => 'required',
            'dokter_id' => 'required|numeric',
            'poli_id' => 'required|numeric',
            'no_ruangan' => 'required|numeric',
            'pengirim' => 'string',
            'diagnosa' => 'required|string',
            'tindak_lanjut' => 'required|string',
        ]);

        // Temukan pasien berdasarkan kode pasien
        $pasien = Pasien::where('kode_pasien', $this->kodePasien)->first();

        // Temukan data berobat berdasarkan ID yang dipilih
        $berobat = Berobat::find($this->selectedId);
        if (!$berobat) {
            session()->flash('error', 'Data Berobat Tidak Ditemukan.');
            return;
        }

        // Update data berobat
        $berobat->update([
            'tgl_berobat' => date('Y-m-d H:i:s'),
            'dokter_id' => $this->dokter_id,
            'poli_id' => $this->poli_id,
            'pasien_id' => $pasien->id,
            'no_ruangan' => $this->no_ruangan,
            'pengirim' => $this->pengirim,
            'diagnosa' => $this->diagnosa,
            'tindak_lanjut' => $this->tindak_lanjut,
        ]);

        // Update resep obat
        // Hapus resep lama yang terkait dengan berobat ini
        Resep::where('berobat_id', $berobat->id)->delete();

        // Ambil daftar obat dari session
        $obatList = Session::get('obat_pasien', []);
        foreach ($obatList as $obat) {
            $dataobat = Obat::where('kode_obat', $obat['kode_obat'])->first();
            if ($dataobat) {
                Resep::create([
                    'berobat_id' => $berobat->id,
                    'obat_id' => $dataobat->id,
                    'jumlah_obat' => $obat['jumlah_obat'],
                    'status' => 'Diresepkan',
                ]);
            }
        }

        // Set flash message for success
        session()->flash('success', 'Data Berobat Berhasil Diperbarui.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $berobat = Berobat::findOrFail($id);
        $this->nama_pasien = $berobat->pasien->nama_pasien;
    }

    public function delete($id)
    {
        $berobat = Berobat::findOrFail($id);
        $berobat->delete();
        Resep::where('berobat_id', $berobat->id)->delete();
        session()->flash('deletesuccess', 'Data Berobat berhasil dihapus!');
        $this->isOpenDelete = false;
    }

    public function mount()
    {
        $this->obat_pasien = Session::get('obat_pasien', []);
    }

    public function resetProperties()
    {
        $this->searchObat = '';
    }

    public function render()
    {
        $queryBerobat = Berobat::with(['pasien', 'dokter', 'poli']);

        if ($this->search != '') {
            $queryBerobat->whereHas('pasien', function ($query) {
                $query->where('nama_pasien', 'like', '%' . $this->search . '%')
                    ->orWhere('nik', 'like', '%' . $this->search . '%');
            });
        }

        $berobats = $queryBerobat->latest()->paginate(10);

        $daftarObat = Obat::query()
            ->where('kode_obat', 'like', '%' . $this->search . '%')
            ->orWhere('nama_obat', 'like', '%' . $this->search . '%')
            ->paginate(3);

        $dokters = Dokter::all();
        $polis = Poli::all();

        return view('livewire.berobat.berobat-index', compact('berobats', 'daftarObat', 'dokters', 'polis'));
    }
}