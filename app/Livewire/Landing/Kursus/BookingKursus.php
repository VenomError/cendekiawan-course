<?php
namespace App\Livewire\Landing\Kursus;

use App\Livewire\Forms\Jadwal\CreateJadwalForm;
use App\Livewire\Forms\Pendaftar\CreatePendaftarForm;
use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.landing')]
class BookingKursus extends Component
{
    public CreateJadwalForm $jadwalForm;
    public CreatePendaftarForm $pendaftarForm;
    public $kursus;
    public $pendaftar;

    public function mount($slug)
    {
        $this->kursus = Kursus::where("slug", $slug)->firstOrFail();
        $auth         = Auth::user();

        $this->pendaftarForm->user_id = $auth->id;

    }
    public function render()
    {
        return view('livewire.landing.kursus.booking-kursus');
    }

    public function submit()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $pendaftar = $this->pendaftarForm->create($this->kursus);
            $jadwal    = $this->jadwalForm->create($this->kursus, $pendaftar);
            DB::commit();
            sweetalert("Booking Success !");

        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }
}
