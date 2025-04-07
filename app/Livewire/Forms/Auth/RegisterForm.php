<?php

namespace App\Livewire\Forms\Auth;

use App\Enum\UserRole;
use App\Models\User;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RegisterForm extends Form
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:100'],
        ];
    }

    public function register(): bool|User
    {
        DB::beginTransaction();
        try
        {
            $this->validate();

            $user = new User($this->all());
            $user->save();

            $user->assignRole(UserRole::PESERTA);

            DB::commit();

            $this->reset();

            flash('Registered User Success');

            return $user;
        } catch (ValidationException $ex)
        {
            flash()->error($ex->getMessage());
            throw $ex;
        } catch (\Throwable $th)
        {
            DB::rollBack();
            flash()->error($th->getMessage());
            return false;
        }
    }
}
