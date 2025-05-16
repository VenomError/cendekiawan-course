<?php
namespace App\Livewire\Dashboard\Users;

use App\Enum\UserRole;
use App\Livewire\Forms\Users\CreateUserForm;
use Livewire\Component;

class AddAdmin extends Component
{
    public CreateUserForm $form;

    public function render()
    {
        return view('livewire.dashboard.users.add-admin');
    }

    public function submit()
    {
        $this->form->create(UserRole::ADMIN);
    }
}
