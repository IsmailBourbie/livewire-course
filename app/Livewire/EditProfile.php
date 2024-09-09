<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Profile')]
class EditProfile extends Component
{
    public function render(): View
    {
        return view('livewire.edit-profile');
    }
}
