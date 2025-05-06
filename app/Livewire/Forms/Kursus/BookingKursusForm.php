<?php

namespace App\Livewire\Forms\Kursus;

use App\Livewire\Forms\Jadwal\CreateJadwalForm;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BookingKursusForm extends Form
{
    public CreateJadwalForm $jadwal;
    
    public function create(){

        try {
            
            // $this->jadwal->create();

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

}
