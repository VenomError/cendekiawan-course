<?php

namespace App\Livewire\Auth;

use App\Enum\UserRole;
use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth')]
class Register extends Component
{
    public RegisterForm $form;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $user = $this->form->register();

        if($user){
            return $this->redirectRoute('login');
        }
    }
}
