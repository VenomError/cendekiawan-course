<?php

namespace App\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Pimpinan extends Component
{
    public $pimpinans ;

    public function render()
    {
        $this->pimpinans = User::pimpinans()->get();

        return view('livewire.dashboard.users.pimpinan');
    }

    public function delete($user_id)
    {
        sweetalert()
            ->showCancelButton()
            ->option('user_id', $user_id)
            ->addWarning('Delete This Pimpinan ?');
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

            return redirect()->route('dashboard.user.pimpinan');

        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
        }

    }
}
