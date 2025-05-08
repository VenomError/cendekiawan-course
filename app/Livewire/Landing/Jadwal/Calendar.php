<?php
namespace App\Livewire\Landing\Jadwal;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.landing')]
class Calendar extends Component
{
    public $data = [];

    public function mount()
    {
        $auth       = Auth::user();
        $this->data = $auth->pendaftaran->flatMap(function ($pendaftar) {
            return $pendaftar->jadwals->map(function ($jadwal) {
                return [
                    'title' => $jadwal->kursus->name,
                    'url'   => route('dashboard.jadwal.detail', ['id' => $jadwal->id]),
                    'start' => $jadwal->start_datetime,
                    'end'   => $jadwal->end_datetime,
                ];
            });
        })->toArray();

    }
    public function render()
    {
        return view('livewire.landing.jadwal.calendar');
    }
}
