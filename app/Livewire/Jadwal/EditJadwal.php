<?php
namespace App\Livewire\Jadwal;

use App\Livewire\Forms\Jadwal\CreateJadwalForm;
use App\Models\Jadwal;
use App\Models\Kursus;
use Livewire\Component;

class EditJadwal extends Component
{
    public CreateJadwalForm $form;
    public $jadwal;
    public $kursus;

    public function mount($id)
    {
        $this->jadwal = Jadwal::findOrFail($id);
        $this->kursus = $this->jadwal->kursus;
        
        $this->form->kursus_id = $this->jadwal->kursus_id;
        $this->form->start_datetime = $this->jadwal->start_datetime->format('Y-m-d\TH:i');
        $this->form->location = $this->jadwal->location;
        $this->form->quota = $this->jadwal->quota;

    }


    public function render()
    {
        return view('livewire.jadwal.edit-jadwal');
    }

    public function submit()
    {
        $this->form->update($this->jadwal);
    }
}
