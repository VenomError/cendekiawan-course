<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Livewire\Forms\Kursus\CreateKursusForm;
use Livewire\Component;

class CreateKursus extends Component
{
    public CreateKursusForm $form;

    public function render()
    {
        return view('livewire.dashboard.kursus.create-kursus');
    }

    public function create()
    {
        $this->form->create();
    }
}
