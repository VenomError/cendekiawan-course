<?php
namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class ListJadwal extends Component
{
    /**
     *
    {
    title: 'Conference',
    url: 'http://google.com/',
    start: '2025-05-11',
    end: '2025-05-13'
    },

     */
    public $jadwals;

    public function mount()
    {
        $this->jadwals = Jadwal::all();
     
    }

    public function render()
    {
        return view('livewire.jadwal.list-jadwal');
    }
}
