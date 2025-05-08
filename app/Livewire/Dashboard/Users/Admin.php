<?php

namespace App\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Admin extends Component
{
    public $admins;

    public function render()
    {
        $this->admins = User::admins()->get();

        return view('livewire.dashboard.users.admin');
    }

    public function delete($user_id)
    {
        sweetalert()
            ->showCancelButton()
            ->option('user_id', $user_id)
            ->addWarning('Delete This Admin ?');
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

            return redirect()->route('dashboard.user.admin');

        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
        }

    }
}
