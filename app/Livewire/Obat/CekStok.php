<?php

namespace App\Livewire\Obat;

use Exception;
use Carbon\Carbon;
use App\Models\Obat;
use Livewire\Component;
use App\Models\LokasiObat;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CekStok extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $kode_obat, $nama_obat, $tgl_expire, $stok, $qty, $satuan, $keterangan, $lokasi_obat_id, $selectedId, $file;
    public $isOpen = false;
    public $isOpenImportObat = false;
    public $isOpenDelete = false;
    protected $updatesQueryString = ['search'];
    public $search = '';

    public function updatingSearch()
    {
        $this->isOpen = false;
        $this->isOpenDelete = false;
        $this->resetPage();
    }

    public function tambah()
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;
        $this->selectedId = null;
    }

    public function showImport()
    {
        $this->isOpenImportObat = true;
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
        ], [
            'file.required' => 'File harus diunggah.',
            'file.mimes' => 'Format file yang diizinkan adalah xls, xlsx, atau csv.',
            'file.file' => 'Pastikan file yang diunggah valid.',
        ]);

        // Menyimpan file sementara
        $filePath = $this->file->getRealPath();

        // Memuat spreadsheet dari file
        $spreadsheet = IOFactory::load($filePath);

        // Ambil sheet pertama
        $sheet = $spreadsheet->getActiveSheet();

        // Ambil data dalam bentuk array
        $rows = $sheet->toArray();

        DB::beginTransaction();
        try {

            DB::table('obats')->truncate();

            foreach ($rows as $index => $row) {
                // Lewati baris pertama jika itu adalah header
                if ($index == 0) {
                    continue;
                }

                // Inisialisasi variabel
                $tglExpire = null;
                $stok = null;

                try {
                    // Cek apakah nilainya adalah tanggal valid sebelum parsing
                    if (strtotime($row[2])) {
                        $tglExpire = Carbon::parse($row[2])->format('Y-m-d');
                    }
                } catch (Exception $e) {
                    // Jika terjadi kesalahan saat parsing, tetapkan null
                    $tglExpire = null;
                }

                // Validasi stok apakah angka valid
                if (is_numeric($row[3])) {
                    $stok = $row[3];
                } else {
                    $stok = 0; // Anda bisa menetapkan nilai default, misalnya 0 jika stok tidak valid
                }

                try {
                    // Simpan data ke database
                    Obat::create([
                        'kode_obat' => $row[0],
                        'nama_obat' => $row[1],
                        'tgl_expire' => $tglExpire,
                        'stok' => $stok,
                        'satuan' => $row[4] ?? null,  // Gunakan null jika kolom kosong
                        'keterangan' => $row[5] ?? null,  // Gunakan null jika kolom kosong
                        'lokasi_obat_id' => $row[6] ?? null,  // Gunakan null jika kolom kosong
                    ]);
                } catch (\Exception $e) {
                    // Jika ada kesalahan di baris tertentu, tampilkan pesan dan lanjutkan
                    session()->flash('error', 'Kesalahan pada baris ke-' . ($index + 1) . ': ' . $e->getMessage());
                }
            }

            DB::commit();
            session()->flash('message', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan umum: ' . $e->getMessage());
        }
        $this->isOpenImportObat = false;
        return redirect()->to('/obat');
    }


    private function resetInputFields()
    {
        $this->nama_obat = '';
        $this->tgl_expire = '';
        $this->stok = '';
        $this->satuan = '';
        $this->keterangan = '';
        $this->lokasi_obat_id = '';
    }

    public function save()
    {
        $this->validate([
            'nama_obat' => 'required|string',
            'tgl_expire' => 'required|date',
            'stok' => 'required|integer',
            'satuan' => 'required|string',
            'keterangan' => 'required|string',
            'lokasi_obat_id' => 'required|integer',
        ]);

        Obat::create([
            'kode_obat' => rand(100000000000000000, 999999999999999999),
            'nama_obat' => $this->nama_obat,
            'tgl_expire' => $this->tgl_expire,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'keterangan' => $this->keterangan,
            'lokasi_obat_id' => $this->lokasi_obat_id,
        ]);

        session()->flash('success', 'Data Obat ' . $this->nama_obat . '  Berhasil Ditambahkan.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isOpenDelete = false;

        $obat = Obat::findOrFail($id);
        $this->selectedId = $id;
        $this->kode_obat = $obat->kode_obat;
        $this->nama_obat = $obat->nama_obat;
        $this->tgl_expire = $obat->tgl_expire;
        $this->stok = $obat->stok;
        $this->satuan = $obat->satuan;
        $this->keterangan = $obat->keterangan;
        $this->lokasi_obat_id = $obat->lokasi_obat_id;
    }


    public function update()
    {
        $validate = $this->validate([
            'nama_obat' => 'required|string',
            'tgl_expire' => 'required',
            'stok' => 'required',
            'satuan' => 'required|string',
            'keterangan' => 'required|string',
            'lokasi_obat_id' => 'required',
        ]);

        Obat::findOrFail($this->selectedId)->update([
            'nama_obat' => $this->nama_obat,
            'tgl_expire' => $this->tgl_expire,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'keterangan' => $this->keterangan,
            'lokasi_obat_id' => $this->lokasi_obat_id,
        ]);

        session()->flash('success', 'Data Pasien an. ' . $this->nama_obat . '  Berhasil Diubah.');

    }

    public function deleteshow($id)
    {
        $this->isOpenImportObat = false;
        $this->isOpenDelete = true;
        $this->isOpen = false;
        $this->selectedId = $id;
        $obat = Obat::findOrFail($id);
        $this->nama_obat = $obat->nama_obat;
    }

    public function delete($id)
    {
        $pasien = Obat::findOrFail($id);
        $pasien->delete();
        session()->flash('deletesuccess', 'Data Pasien berhasil dihapus!');
        $this->isOpenDelete = false;
    }

    public function render()
    {
        $query = Obat::query();

        if ($this->search !== null) {
            $query->where('nama_obat', 'like', '%' . $this->search . '%')
                ->orWhere('keterangan', 'like', '%' . $this->search . '%');
        }

        $obats = $query->latest()->paginate(10);

        $lokasiObats = LokasiObat::all();
        return view('livewire.obat.cek-stok', compact(['lokasiObats', 'obats']));
    }
}
