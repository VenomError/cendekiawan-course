<?php
namespace App\Livewire\Jadwal;

use App\Livewire\Forms\Jadwal\CreateJadwalForm;
use App\Models\Kursus;
use Livewire\Component;

class AddJadwal extends Component
{
    public CreateJadwalForm $form;
    public $kursuses;

    public function mount()
    {
        $this->kursuses = Kursus::orderBy('name')->get();
    }

    public function render()
    {

        return view('livewire.jadwal.add-jadwal');
    }

    public function submit()
    {
        $this->form->create();
    }
}
