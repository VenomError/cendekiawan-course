<?php

namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class ListJadwal extends Component
{
    public $jadwals;

    public function mount(){
        $this->jadwals = Jadwal::all();
    }

    public function render()
    {
        return view('livewire.jadwal.list-jadwal');
    }
}
