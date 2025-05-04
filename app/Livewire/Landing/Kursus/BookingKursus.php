<?php

namespace App\Livewire\Landing\Kursus;

use App\Models\Kursus;
use Livewire\Component;

class BookingKursus extends Component
{

    public $kursus;
    public function mount($slug){
        $this->kursus = Kursus::where("slug", $slug)->first();
    }
    public function render()
    {
        return view('livewire.landing.kursus.booking-kursus');
    }
}
