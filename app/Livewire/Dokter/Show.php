<?php

namespace App\Livewire\Dokter;

use App\Models\User;
use App\Models\Dokter;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nip, $nama_dokter, $jenis_kelamin, $no_telp, $alamat, $spesialis, $email, $password, $password_confirmation, $selectedId, $user_id;
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
        $this->nip = '';
        $this->nama_dokter = '';
        $this->jenis_kelamin = '';
        $this->no_telp = '';
        $this->alamat = '';
        $this->spesialis = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function save()
    {
        $this->validate([
            'nip' => 'required|numeric|unique:dokters',
            'nama_dokter' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'spesialis' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $this->nama_dokter;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->level = 'dokter';
        $user->save();

        Dokter::create([
            'nip' => $this->nip,
            'nama_dokter' => $this->nama_dokter,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'spesialis' => $this->spesialis,
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Data an. ' . $this->nama_dokter . ' Dokter Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $dokter = Dokter::findOrFail($id);
        $this->selectedId = $dokter->id;
        $this->user_id = $dokter->user_id;
        $this->nip = $dokter->nip;
        $this->nama_dokter = $dokter->nama_dokter;
        $this->jenis_kelamin = $dokter->jenis_kelamin;
        $this->no_telp = $dokter->no_telp;
        $this->alamat = $dokter->alamat;
        $this->spesialis = $dokter->spesialis;
        $this->email = User::findOrFail($dokter->user_id)->email;

    }


    public function update()
    {
        $this->validate([
            'nip' => 'required|numeric|unique:dokters,nip,' . $this->selectedId,
            'nama_dokter' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'spesialis' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        Dokter::findOrFail($this->selectedId)->update([
            'nip' => $this->nip,
            'nama_dokter' => $this->nama_dokter,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'spesialis' => $this->spesialis,
        ]);

        $user = User::findOrFail($this->user_id);
        $user->name = $this->nama_dokter;
        $user->email = $this->email;
        if ($this->password !== null) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        session()->flash('success', 'Data an. ' . $this->nama_dokter . ' Dokter Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $dokter = Dokter::findOrFail($id);
        $this->nama_dokter = $dokter->nama_dokter;
    }

    public function delete($id)
    {
        $dokter = Dokter::findOrFail($id);
        User::findOrFail($dokter->user_id)->delete();
        $dokter->delete();
        session()->flash('deletesuccess', 'Data Dokter berhasil dihapus!');
        $this->isOpenDelete = false;
    }


    public function render()
    {
        $dokters = Dokter::paginate(10);
        return view('livewire.dokter.show', compact('dokters'));
    }
}
