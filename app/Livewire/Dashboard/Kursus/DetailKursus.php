<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Models\Kursus;
use Livewire\Component;

class DetailKursus extends Component
{
    public $kursus;
    public $pendaftars;
    public $jadwals;

    public function mount($kursus_id)
    {
        $this->kursus = Kursus::findOrFail($kursus_id);
        $this->kursus->load(['pendaftars', 'jadwals']);
        $this->pendaftars = $this->kursus->pendaftars;
        $this->jadwals = $this->kursus->jadwals;
    }

    public function render()
    {
        return view('livewire.dashboard.kursus.detail-kursus');
    }
}
