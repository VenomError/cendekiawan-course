<?php
namespace App\Livewire\Forms\Pembayaran;

use App\Enum\PembayaranStatus;
use App\Models\Kursus;
use App\Models\Pembayaran;
use App\Models\Pendaftar;
use Livewire\Form;
use Livewire\WithFileUploads;

class CreatePembayaranForm extends Form
{
    use WithFileUploads;
    public $receipt;

    public function rules()
    {
        return [
            "receipt" => "required|image",
        ];
    }

    public function uploadReceipt()
    {
        if ($this->receipt) {
            return $this->receipt->storePublicly(path:'receipt' , options:'public');
        }

        return null;
    }

    public function create(Pendaftar $pendaftar, Kursus $kursus, PembayaranStatus $status)
    {
        $this->validate();

        try {
            $pembayaran               = new Pembayaran();
            $pembayaran->amount       = $kursus->price;
            $pembayaran->receipt      = $this->uploadReceipt();
            $pembayaran->status       = $status;
            $pembayaran->payment_date = now('Asia/Makassar');
            $pembayaran->kursus_id    = $kursus->id;
            $pembayaran->pendaftar_id = $pendaftar->id;

            $pembayaran->save();

            // sweetalert('Uploaded Success');
            $this->reset('receipt');
            return $pembayaran;
        } catch (\Throwable $th) {
            flash()->error($th->getMessage());
            return false;
        }
    }

}
