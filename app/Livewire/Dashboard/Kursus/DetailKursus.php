<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Models\Kursus;
use Livewire\Component;

class DetailKursus extends Component
{
    public $kursus ;

    public function mount($kursus_id)
    {
        $this->kursus = Kursus::findOrFail($kursus_id);
    }

    public function render()
    {
        return view('livewire.dashboard.kursus.detail-kursus');
    }
}
