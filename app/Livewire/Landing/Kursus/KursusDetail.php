<?php
namespace App\Livewire\Landing\Kursus;

use App\Models\Kursus;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.landing")]
class KursusDetail extends Component
{

    public $kursus;
    public $lastSchedule;
    public $location;

    public function mount($slug)
    {
        $this->kursus       = Kursus::where("slug", $slug)->firstOrFail();
        $this->lastSchedule = $this->kursus->jadwals()->latest("end_datetime")->value('end_datetime');
        $this->location =  $this->kursus->jadwals()->latest("location")->value('location');
    }

    public function render()
    {
        return view('livewire.landing.kursus.kursus-detail');
    }
}
