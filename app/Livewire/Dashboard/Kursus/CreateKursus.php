<?php
namespace App\Livewire\Dashboard\Kursus;

use App\Livewire\Forms\Kursus\CreateKursusForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateKursus extends Component
{
    use WithFileUploads;

    public $thumbnail;
    public $teacherFoto;

    public CreateKursusForm $form;

    public $benefit;

    public function render()
    {
        return view('livewire.dashboard.kursus.create-kursus');
    }

    public function addBenefit(){
        $this->validate([
            'benefit' => 'required|string|max:255'
        ]);
        $this->form->benefits[] = $this->benefit;
        $this->reset('benefit');
    }

    public function removeBenefit($index){
        unset($this->form->benefits[$index]);
        $this->form->benefits = array_values($this->form->benefits);
    }

    public function create()
    {
        $this->validate([
            'thumbnail'   => ['required', 'image'],
            'teacherFoto' => ['required', 'image'],
        ]);

        $this->form->uploadThumbnail($this->thumbnail);
        $this->form->uploadTeacherFoto($this->teacherFoto);
        $this->form->create();
    }
}
