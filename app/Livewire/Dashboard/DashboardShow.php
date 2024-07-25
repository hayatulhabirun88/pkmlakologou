<?php

namespace App\Livewire\Dashboard;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pegawai;
use Livewire\Component;
use App\Models\LoketLayanan;

class DashboardShow extends Component
{
    public function render()
    {
        $totalpegawai = Pegawai::count();
        $totaldokter = Dokter::count();
        $totalPendaftaran = LoketLayanan::count();
        $totalObat = Obat::count();
        return view('livewire.dashboard.dashboard-show', compact(['totalpegawai', 'totaldokter', 'totalPendaftaran', 'totalObat']));
    }
}
