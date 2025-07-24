<?php
namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class CalendarJadwal extends Component
{

    public $jadwals;
    public $data = [];

    public function mount()
    {
        $this->jadwals = Jadwal::all();
        $this->data    = $this->jadwals->map(function ($jadwal) {
            
            return [
                'title'     => $jadwal->kursus->name,
                'url'       => route('dashboard.jadwal.edit', ['id' => $jadwal->id]),
                'start'     => $jadwal->start_datetime,
                'end'       => $jadwal->end_datetime,
                'color'     => match ($jadwal->status['color']) {
                    'primary'   => '#007bff',
                    'success'   => '#28a745',
                    'secondary' => '#6c757d',
                    default     => '#343a40',
                },
            ];
        });

    }
    public function render()
    {
        return view('livewire.jadwal.calendar-jadwal');
    }
}
