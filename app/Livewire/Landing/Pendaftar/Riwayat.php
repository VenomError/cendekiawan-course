<?php

namespace App\Livewire\Landing\Pendaftar;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.landing')]
class Riwayat extends Component
{
    public $riwayats;

    public function mount(){
        $user = Auth::user();
        $this->riwayats = $user->pendaftaran()->latest()->get();
    }

    public function render()
    {
        return view('livewire.landing.pendaftar.riwayat');
    }
}
