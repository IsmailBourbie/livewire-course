<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use Illuminate\View\View;
use Livewire\Component;

class Signup extends Component
{
    public ProfileForm $form;

    public function save(): void
    {
        $this->form->store();
    }

    public function render(): View
    {
        return view('livewire.signup');
    }
}
