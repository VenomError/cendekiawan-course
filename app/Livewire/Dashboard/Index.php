<?php
namespace App\Livewire\Dashboard;

use App\Enum\PendaftarStatus;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pendaftar;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $totalAdmin           = 0;
    public $totalPeserta         = 0;
    public $totalKursus          = 0;
    public $totalJadwal          = 0;
    public $totalPendaftar       = 0;
    public $totalPendaftarNew    = 0;
    public $totalPendaftarCancel = 0;
    public $totalPendaftarActive = 0;

    public function mount()
    {
        $this->totalAdmin           = User::admins()->count();
        $this->totalPeserta         = User::pesertas()->count();
        $this->totalJadwal          = Jadwal::count();
        $this->totalPendaftar       = Pendaftar::count();
        $this->totalPendaftarNew    = Pendaftar::where('status', PendaftarStatus::NEW )->count();
        $this->totalPendaftarCancel = Pendaftar::where('status', PendaftarStatus::CANCEL)->count();
        $this->totalPendaftarActive = Pendaftar::where('status', PendaftarStatus::ACTIVE)->count();
        $this->totalKursus          = Kursus::count();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
