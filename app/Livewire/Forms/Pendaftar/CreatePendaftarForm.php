<?php
namespace App\Livewire\Forms\Pendaftar;

use App\Enum\PendaftarStatus;
use App\Models\Kursus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CreatePendaftarForm extends Form
{
    /**
    "user_id",
    "phone",
    "institute",
    "pekerjaan",
    "jabatan",
    "status",
     */

    public $user_id;
    public $phone;
    public $institute;
    public $pekerjaan;
    public $jabatan;
    public $status;

    public function rules()
    {

        return [
            'user_id'   => ['required', 'exists:users,id'],
            'phone'     => ['required'],
            'institute' => ['required'],
            'pekerjaan' => ['nullable'],
            'jabatan'   => ['nullable'],
            'status'    => ['nullable', Rule::in(PendaftarStatus::values())],
        ];

    }

    public function create(Kursus | Model $kursus)
    {
        $this->status = PendaftarStatus::NEW ->value;
        $this->validate();

        try {
            $pendaftar = $kursus->pendaftars()->create($this->all());
            $pendaftar->save();

            return $pendaftar;
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

}
