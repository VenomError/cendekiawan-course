<?php
namespace App\Livewire\Dashboard\Users;

use App\Livewire\Forms\Users\CreateUserForm;
use App\Models\User;
use Livewire\Component;

class EditPimpinan extends Component
{
    public CreateUserForm $form;
    public $user;
    public function mount($id)
    {
        $this->user = User::findOrFail($id);

        $this->form->name  = $this->user->name;
        $this->form->email = $this->user->email;
        
    }

    public function render()
    {
        return view('livewire.dashboard.users.edit-pimpinan');
    }

    public function submit()
    {
        $this->form->update($this->user);
    }
}
