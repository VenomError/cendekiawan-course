<?php

namespace App\Livewire\Landing\Kursus;

use App\Models\Kursus;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.landing')]
class ListKursus extends Component
{
    public $kursuses ;

    public function mount(){

        $this->kursuses = Kursus::latest()->get();

    }
    public function render()
    {
        return view('livewire.landing.kursus.list-kursus');
    }
}
