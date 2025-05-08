<?php

namespace App\Livewire\Dashboard\Kursus;

use App\Models\Kursus;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ListKursus extends Component
{
    public $kursuses;
    public function render()
    {
        $this->kursuses = Kursus::latest()->get();

        return view('livewire.dashboard.kursus.list-kursus');
    }


    public function delete($kursus_id)
    {
        sweetalert()
            ->showCancelButton()
            ->option('kursus_id', $kursus_id)
            ->addWarning('Delete This Kursus ?');
    }

    #[On('sweetalert:confirmed')]
    public function deleteConfirm(array $payload)
    {
        $kursus_id = $payload[ 'envelope' ][ 'options' ][ 'kursus_id' ];

        try
        {
            DB::transaction(function () use ($kursus_id) {
                Kursus::find($kursus_id)->delete();
            });

            flash('Delete Kursus Success');

            return redirect()->route('dashboard.kursus.list');

        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
        }

    }
}
