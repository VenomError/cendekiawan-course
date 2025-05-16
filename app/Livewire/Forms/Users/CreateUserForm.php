<?php
namespace App\Livewire\Forms\Users;

use App\Enum\UserRole;
use App\Models\User;
use Livewire\Form;

class CreateUserForm extends Form
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ];
    }

    public function create(UserRole $role)
    {

        $this->validate();
        try {
            $user = new User($this->all());
            $user->save();

            $user->assignRole($role);

            flash()->success('Created Success');
            $this->reset();
            return $user;

        } catch (\Throwable $th) {
            flash()->error($th->getMessage());
            return false;
            // throw $th;
        }
    }

    public function update(User $user)
    {
        $this->validate(
            rules: [
                'name'     => ['nullable'],
                'email'    => ['nullable', 'email', "unique:users,email,{$user->id}"],
                'password' => ['required'],
            ]
        );

        try {
            
            if ($user->update($this->all())) {
                flash()->success('Update Success');
                return true;
            }
        } catch (\Throwable $th) {
            flash()->error($th->getMessage());
            return false;
            //throw $th;
        }
    }

}
