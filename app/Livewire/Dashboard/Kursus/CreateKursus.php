<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Livewire\Forms\Kursus\CreateKursusForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateKursus extends Component
{
    use WithFileUploads;

    public $thumbnail;

    public CreateKursusForm $form;

    public function render()
    {
        return view('livewire.dashboard.kursus.create-kursus');
    }

    public function create()
    {
        $this->validate([
            'thumbnail' => ['required','image'],
        ]);

        $this->form->uploadThumbnail($this->thumbnail);
        $this->form->create();
    }
}
