<?php

namespace App\Livewire\Landing\Kursus;

use Livewire\Component;

class BookingKursus extends Component
{

    public $kursus;
    public function mount($slug){
        
    }
    public function render()
    {
        return view('livewire.landing.kursus.booking-kursus');
    }
}
