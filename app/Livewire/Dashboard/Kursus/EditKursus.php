<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Models\Kursus;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Livewire\Forms\Kursus\UpdateKursusForm;

class EditKursus extends Component
{

    public UpdateKursusForm $form;

    /**
     *
     * @var Collection<int,Kursus>
     */
    public $kursus;

    public function mount($kursus_id)
    {
        $this->kursus = Kursus::findOrFail($kursus_id);
        $this->form->setFrom($this->kursus);

    }

    public function render()
    {
        return view('livewire.dashboard.kursus.edit-kursus');
    }

    public function update()
    {
        $this->form->update($this->kursus);
    }
}
