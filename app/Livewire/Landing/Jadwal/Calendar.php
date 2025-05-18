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
        $this->data = $auth->jadwals->map(function ($jadwal) {
            return [
                'title' => $jadwal->kursus->name,
                'url'   => route('landing.kursus.detail', ['slug' => $jadwal->kursus->slug]),
                'start' => $jadwal->start_datetime,
                'end'   => $jadwal->end_datetime,
            ];
        });

    }
    public function render()
    {
        return view('livewire.landing.jadwal.calendar');
    }
}
