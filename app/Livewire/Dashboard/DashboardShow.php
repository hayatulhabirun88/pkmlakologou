<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Berobat;
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
        $totalBerobat = Berobat::count();
        $totalResep = Resep::count();

        $totalPendaftaranPertahun = LoketLayanan::whereYear('created_at', Carbon::now()->year)->count();
        $totalPendaftaranPerbulan = LoketLayanan::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $totalPendaftaranHariIni = LoketLayanan::whereDate('created_at', Carbon::today())->count();


        $totalBerobatTahunIni = Berobat::whereYear('created_at', Carbon::now()->year)->count();
        $totalBerobatBulanIni = Berobat::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $totalBerobatHariIni = Berobat::whereDate('created_at', Carbon::today())->count();

        $totalResepTahunIni = Resep::whereYear('created_at', Carbon::now()->year)->count();
        $totalResepBulanIni = Resep::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $totalResepHariIni = Resep::whereDate('created_at', Carbon::today())->count();


        return view('livewire.dashboard.dashboard-show', compact(['totalpegawai', 'totaldokter', 'totalPendaftaran', 'totalObat', 'totalBerobat', 'totalResep', 'totalPendaftaranPertahun', 'totalPendaftaranPerbulan', 'totalPendaftaranHariIni', 'totalBerobatTahunIni', 'totalBerobatBulanIni', 'totalBerobatHariIni', 'totalResepTahunIni', 'totalResepBulanIni', 'totalResepHariIni']));
    }
}
