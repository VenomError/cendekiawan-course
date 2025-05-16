<?php

namespace App\Livewire\Dashboard\Pendaftar;

use App\Models\Kursus;
use Livewire\Component;

class NewPendaftar extends Component
{
    public function render()
    {
        $kursus = Kursus::find(2);
        return view('livewire.dashboard.pendaftar.new-pendaftar');
    }
  


}
