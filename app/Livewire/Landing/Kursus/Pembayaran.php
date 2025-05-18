<?php
namespace App\Livewire\Landing\Kursus;

use App\Enum\PembayaranStatus;
use App\Livewire\Forms\Pembayaran\CreatePembayaranForm;
use App\Models\Kursus;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout("layouts.landing")]
class Pembayaran extends Component
{
    use WithFileUploads;
    public CreatePembayaranForm $form;

    public $kursus;
    public $pendaftar;

    public function mount($slug, $pendaftar_id)
    {
        $this->kursus    = Kursus::where("slug", $slug)->firstOrFail();
        $this->pendaftar = Pendaftar::findOrFail($pendaftar_id);
    }

    public function render()
    {
        return view('livewire.landing.kursus.pembayaran');
    }

    public function submit()
    {
        $pembayaran = $this->form->create($this->pendaftar, $this->kursus, PembayaranStatus::PENDING);

        if ($pembayaran) {
            $receipt = asset(Storage::url($pembayaran->receipt));
            $message = "
Saya Telah Melakukan Pembayaran
Kursus Name: {$this->kursus->name}
Nominal : {$pembayaran->amount}
Receipt : 
{$receipt}
"

            ;

            return redirect()->route('chat-wa', [
                'message' => $message,
            ]);
        }
    }
}
