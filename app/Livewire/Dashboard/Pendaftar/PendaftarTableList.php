<?php

namespace App\Livewire\Dashboard\Pendaftar;

use Livewire\Component;
use App\Models\Pendaftar;
use Livewire\Attributes\On;
use App\Enum\PendaftarStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 * @property-read Collection<int,Pendaftar> $pendaftars
 *
 */
class PendaftarTableList extends Component
{

    public PendaftarStatus $status;
    public $pendaftars ;

    public function mount()
    {
        if(empty($this->status)){

            $this->pendaftars = Pendaftar::all();

        }else{

            $this->pendaftars = Pendaftar::where('status' , $this->status)->get();

        }
    }

    public function render()
    {
        return view('livewire.dashboard.pendaftar.pendaftar-table-list');
    }

    public function delete($pendaftar_id)
    {
        sweetalert()
        ->showCancelButton()
        ->option('pendaftar_id' , $pendaftar_id)
        ->warning('Delete This Pendaftar ?');
    }

    #[On('sweetalert:confirmed')]
    public function confirmDelete(array $payload){

        $pendaftar_id = $payload['envelope']['options']['pendaftar_id'];

        try {
            $pendaftar = Pendaftar::findOr($pendaftar_id , function(){
                flash()->error('Pendaftar Not Found');
            });
            $pendaftar->delete();

            flash('Delete Pendaftar Success');

            return reloadPage();
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function cancel(Pendaftar $pendaftar)
    {
        try {
            $pendaftar->status = PendaftarStatus::CANCEL;
            $pendaftar->save();

            flash('Update Pendaftar Status Success');
            return reloadPage();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function active(Pendaftar $pendaftar)
    {
        try {
            $pendaftar->status = PendaftarStatus::ACTIVE;
            $pendaftar->save();

            flash('Update Pendaftar Status Success');
            return reloadPage();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
