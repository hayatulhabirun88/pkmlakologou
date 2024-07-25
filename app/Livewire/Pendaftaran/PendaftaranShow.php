<?php

namespace App\Livewire\Pendaftaran;

use Carbon\Carbon;
use App\Models\Poli;
use App\Models\User;
use App\Models\Pasien;
use Livewire\Component;
use App\Models\LoketLayanan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class PendaftaranShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nik, $kode_pasien, $nama_pasien, $jenis_kelamin, $tanggal_lahir, $golongan_darah, $umur, $alamat, $jenis_pasien, $poli, $selectedId;
    public $isOpen = false;
    public $isOpenDelete = false;
    public $isOpenPoli = false;
    protected $updatesQueryString = ['search'];
    public $search = '';

    public function updatingSearch()
    {
        $this->isOpenPoli = false;
        $this->isOpen = false;
        $this->isOpenDelete = false;
        $this->resetPage();
    }

    public function cari()
    {
        $query = Pasien::query();

        if ($this->search !== null) {
            $query->where('nama_pasien', 'like', '%' . $this->search . '%')
                ->orWhere('nik', 'like', '%' . $this->search . '%');
        }

        $pasiens = $query->latest()->paginate(10);
    }

    public function tambah()
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;
        $this->isOpenPoli = false;
        $this->selectedId = null;
    }

    public function generatePatientCode()
    {
        $nameSegment = substr($this->nama_pasien, 0, 3);
        $dateSegment = str_replace('-', '', $this->tanggal_lahir);
        $randomSegment = rand(1000, 9999);

        $this->kode_pasien = strtoupper($nameSegment) . $this->umur . $dateSegment . $randomSegment;
    }

    public function poliShow($id)
    {
        $this->isOpenPoli = true;
        $this->isOpenDelete = false;
        $this->isOpen = false;
        $this->selectedId = $id;
        $pasien = Pasien::find($id);
        $this->nama_pasien = $pasien->nama;
        $loket = LoketLayanan::where('pasien_id', $id)->get();
        foreach ($loket as $key => $value) {
            if ($value->tgl_loket == date('Y-m-d')) {
                $this->poli = $value->poli_id;
            }
        }
    }

    public function resetSimpanLoket()
    {
        $this->poli = null;
    }

    public function simapanLoket($id)
    {
        $this->validate([
            'poli' => 'required',
        ]);

        LoketLayanan::updateOrCreate(
            [
                'tgl_daftar' => date('Y-m-d'),
                'pasien_id' => $id,
            ],
            [
                'kode_layanan' => 'PKMLKG-' . rand(100000, 999999),
                'poli_id' => $this->poli,
            ]
        );

        session()->flash('successSimpanLoket', 'Data Pasien Berhasil Didaftarkan.');

        $this->isOpenPoli = false;
        $this->resetSimpanLoket();

    }

    private function resetInputFields()
    {
        $this->kode_pasien = '';
        $this->nik = '';
        $this->nama_pasien = '';
        $this->jenis_kelamin = '';
        $this->golongan_darah = '';
        $this->umur = '';
        $this->tanggal_lahir = '';
        $this->alamat = '';
        $this->jenis_pasien = '';
    }

    public function save()
    {
        $this->validate([
            'nik' => 'required|numeric|unique:pasiens',
            'nama_pasien' => 'required|string',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|string',
            'jenis_pasien' => 'required',
        ]);

        $this->generatePatientCode();

        Pasien::create([
            'kode_pasien' => $this->kode_pasien,
            'nik' => $this->nik,
            'nama_pasien' => $this->nama_pasien,
            'jenis_kelamin' => $this->jenis_kelamin,
            'golongan_darah' => $this->golongan_darah,
            'umur' => Carbon::parse($this->tanggal_lahir)->diffInYears(Carbon::now()),
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'jenis_pasien' => $this->jenis_pasien,
        ]);

        session()->flash('success', 'Data Pasien  an. ' . $this->nama_pasien . '  Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;
        $this->isOpenPoli = false;

        $pasien = Pasien::findOrFail($id);
        $this->selectedId = $pasien->id;
        $this->kode_pasien = $pasien->kode_pasien;
        $this->nik = $pasien->nik;
        $this->nama_pasien = $pasien->nama_pasien;
        $this->jenis_kelamin = $pasien->jenis_kelamin;
        $this->golongan_darah = $pasien->golongan_darah;
        $this->tanggal_lahir = $pasien->tanggal_lahir;
        $this->umur = $pasien->umur;
        $this->alamat = $pasien->alamat;
        $this->jenis_pasien = $pasien->jenis_pasien;

    }


    public function update()
    {
        $this->validate([
            'nik' => 'required|numeric|unique:pasiens,nik,' . $this->selectedId,
            'nama_pasien' => 'required|string',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|string',
            'jenis_pasien' => 'required',
        ]);

        Pasien::findOrFail($this->selectedId)->update([
            'nik' => $this->nik,
            'nama_pasien' => $this->nama_pasien,
            'jenis_kelamin' => $this->jenis_kelamin,
            'golongan_darah' => $this->golongan_darah,
            'tanggal_lahir' => $this->tanggal_lahir,
            'umur' => Carbon::parse($this->tanggal_lahir)->diffInYears(Carbon::now()),
            'alamat' => $this->alamat,
            'jenis_pasien' => $this->jenis_pasien,
        ]);

        session()->flash('success', 'Data Pasien an. ' . $this->nama_pasien . '  Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $pasien = Pasien::findOrFail($id);
        $this->nama_pasien = $pasien->nama_pasien;
    }

    public function delete($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        session()->flash('deletesuccess', 'Data Pasien berhasil dihapus!');
        $this->isOpenDelete = false;
    }

    public function render()
    {
        $query = Pasien::query();

        if ($this->search !== null) {
            $query->where('nama_pasien', 'like', '%' . $this->search . '%')
                ->orWhere('nik', 'like', '%' . $this->search . '%');
        }

        $pasiens = $query->latest()->paginate(10);


        $daftarPoli = Poli::all();
        return view('livewire.pendaftaran.pendaftaran-show', compact(['pasiens', 'daftarPoli']));
    }
}
