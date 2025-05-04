<?php

namespace App\Livewire\Landing\Kursus;

use App\Models\Kursus;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.landing')]
class BookingKursus extends Component
{

    public $kursus;
    
    public function mount($slug){
        $this->kursus = Kursus::where("slug", $slug)->firstOrFail();
        
    }
    public function render()
    {
        return view('livewire.landing.kursus.booking-kursus');
    }
}
