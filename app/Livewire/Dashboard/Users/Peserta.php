<?php

namespace App\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Peserta extends Component
{
    public $pesertas;

    public function render()
    {
        $this->pesertas = User::pesertas()->get();

        return view('livewire.dashboard.users.peserta');
    }


    public function delete($user_id)
    {
        sweetalert()
            ->showCancelButton()
            ->option('user_id', $user_id)
            ->addWarning('Delete This User ?');
    }

    #[On('sweetalert:confirmed')]
    public function deleteConfirm(array $payload)
    {
        $user_id = $payload[ 'envelope' ][ 'options' ][ 'user_id' ];

        try
        {
            DB::transaction(function () use ($user_id) {
                User::find($user_id)->delete();
            });

            flash('Delete User Success');

            return redirect()->route('dashboard.user.peserta');

        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
        }

    }
}
