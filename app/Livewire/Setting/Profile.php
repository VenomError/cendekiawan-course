<?php
namespace App\Livewire\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;

    public $currentPassword;
    public $password;

    public function mount()
    {

        $user        = Auth::user();
        $this->name  = $user->name;
        $this->email = $user->email;

    }

    public function render()
    {
        return view('livewire.setting.profile');
    }

    public function update()
    {
        $this->validate([
            'name'            => ['required'],
            'email'           => ['required', Rule::unique('users', 'email')->ignore(Auth::id())],
            'currentPassword' => ['nullable', 'current_password'],
            'password'        => ['required_with:currentPassword'],
        ]);

        try {
            $user = User::find(Auth::id());

            $user->name  = $this->name;
            $user->email = $this->email;

            if ($this->password) {
                $user->password = $this->password;
            }

            $user->save();

            flash('updated success');
            Auth::logout();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            flash()->error($th->getMessage());
            return;
        }
    }
}
