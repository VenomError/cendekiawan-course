<?php

namespace App\Livewire\Landing;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.landing')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.landing.index');
    }
}
