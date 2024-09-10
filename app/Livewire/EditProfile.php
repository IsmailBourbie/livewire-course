<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Profile')]
class EditProfile extends Component
{
    public ProfileForm $form;
    public bool $showSuccessIndicator = false;

    public function save(): void
    {
        $this->form->update();
        $this->showSuccessIndicator = true;
    }

    public function mount(): void
    {
        $this->form->setUser(auth()->user());
    }

    public function render(): View
    {
        return view('livewire.edit-profile');
    }
}
