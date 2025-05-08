<?php

namespace App\Livewire\Forms\Auth;

use App\Enum\UserRole;
use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginForm extends Form
{
    public $email;
    public $password;

    public $remember = false;

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function login()
    {
        $this->validate();

        try
        {
            $this->cekUser();

            // Login Logic

            if (
                !Auth::attempt([
                    'email' => $this->email,
                    'password' => $this->password
                ], $this->remember)
            )
            {
                throw new \Exception("Failed to Login");
            }

            $auth = Auth::user();

            if ($auth->hasAnyRole([UserRole::ADMIN, UserRole::PIMPINAN]))
            {
                return redirect()->route('dashboard.index');
            } elseif ($auth->hasRole(UserRole::PESERTA))
            {
                return redirect()->route('home');
            } else
            {

                Auth::logout();

                throw new \Exception("Invalid Role");

            }

        } catch (ModelNotFoundException $er)
        {
            flash()->error($er->getMessage());
        } catch (\Throwable $th)
        {
            flash()->error($th->getMessage());
            return false;
        }

    }

    private function cekUser()
    {

        $finder = User::where('email', '=', $this->email)
            ->first();

        if (!$finder)
        {
            throw new ModelNotFoundException("User not Found");
        }
        return true;

    }
}
