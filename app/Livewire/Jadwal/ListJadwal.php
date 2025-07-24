<?php
namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ListJadwal extends Component
{
    /**
     *
    {
    title: 'Conference',
    url: 'http://google.com/',
    start: '2025-05-11',
    end: '2025-05-13'
    },

     */
    public $jadwals;

    public function mount()
    {
        $this->jadwals = Jadwal::all();
     
    }

    public function render()
    {
        return view('livewire.jadwal.list-jadwal');
    }

    public function delete($jadwal_id)
    {
        sweetalert()
            ->showCancelButton()
            ->option('jadwal_id', $jadwal_id)
            ->addWarning('Delete This Jadwal ?');
    }

    #[On('sweetalert:confirmed')]
    public function deleteConfirm(array $payload)
    {
        $jadwal_id = $payload[ 'envelope' ][ 'options' ][ 'jadwal_id' ];

        try
        {
            DB::transaction(function () use ($jadwal_id) {
                Jadwal::find($jadwal_id)->delete();
            });

            flash('Delete Jadwal Success');

            return redirect()->route('dashboard.jadwal.list');

        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
        }

    }
}
