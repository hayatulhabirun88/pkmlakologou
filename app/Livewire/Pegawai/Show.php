<?php

namespace App\Livewire\Pegawai;

use App\Models\User;
use App\Models\Pegawai;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nik, $nama, $jenis_kelamin, $tgl_lahir, $alamat, $jabatan, $email, $password, $password_confirmation, $level, $selectedId, $user_id;
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
        $this->nik = '';
        $this->nama = '';
        $this->tgl_lahir = '';
        $this->jenis_kelamin = '';
        $this->alamat = '';
        $this->jabatan = '';
        $this->level = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function save()
    {
        $this->validate([
            'nik' => 'required|numeric|unique:pegawais',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'level' => 'required',
        ]);

        $user = new User();
        $user->name = $this->nama;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->level = $this->level;
        $user->save();

        Pegawai::create([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'jabatan' => $this->jabatan,
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Pegawai  an. ' . $this->nama . '  Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $pegawai = Pegawai::findOrFail($id);
        $this->selectedId = $pegawai->id;
        $this->user_id = $pegawai->user_id;
        $this->nik = $pegawai->nik;
        $this->nama = $pegawai->nama;
        $this->tgl_lahir = $pegawai->tanggal_lahir;
        $this->jenis_kelamin = $pegawai->jenis_kelamin;
        $this->alamat = $pegawai->alamat;
        $this->jabatan = $pegawai->jabatan;
        $this->email = User::findOrFail($pegawai->user_id)->email;
        $this->level = User::findOrFail($pegawai->user_id)->level;
    }


    public function update()
    {
        $this->validate([
            'nik' => 'required|numeric|unique:pegawais,nik,' . $this->selectedId,
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'level' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        Pegawai::findOrFail($this->selectedId)->update([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'jenis_kelamin' => $this->jenis_kelamin,
            'jabatan' => $this->jabatan,
        ]);

        $user = User::findOrFail($this->user_id);
        $user->name = $this->nama;
        $user->email = $this->email;
        if ($this->password !== null) {
            $user->password = Hash::make($this->password);
        }
        $user->level = $this->level;
        $user->save();

        session()->flash('success', 'Data an. ' . $this->nama . ' Dokter Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $pegawai = Pegawai::findOrFail($id);
        $this->nama = $pegawai->nama;
    }

    public function delete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        User::findOrFail($pegawai->user_id)->delete();
        $pegawai->delete();
        session()->flash('deletesuccess', 'Data Pegawai berhasil dihapus!');
        $this->isOpenDelete = false;
    }
    public function render()
    {
        $pegawais = Pegawai::paginate(10);
        return view('livewire.pegawai.show', compact(['pegawais']));
    }
}
