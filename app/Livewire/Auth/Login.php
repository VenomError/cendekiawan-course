<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class Login extends Component
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->form->login();
    }
}
