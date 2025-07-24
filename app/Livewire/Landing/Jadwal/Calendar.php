<?php
namespace App\Livewire\Landing\Jadwal;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.landing')]
class Calendar extends Component
{
    public $data = [];

    public function mount()
    {
        $user = Auth::user();

        $this->data = $user->jadwals->map(function ($jadwal) {
            return [
                'title'     => $jadwal->kursus->name ?? 'Tanpa Kursus',
                'start'     => $jadwal->start_datetime,
                'end'       => $jadwal->end_datetime,
                'color'     => match ($jadwal->status['color'] ?? null) {
                    'primary'   => '#007bff',
                    'success'   => '#28a745',
                    'secondary' => '#6c757d',
                    default     => '#343a40',
                },
            ];
        })->toArray();

    }
    public function render()
    {
        return view('livewire.landing.jadwal.calendar');
    }
}
