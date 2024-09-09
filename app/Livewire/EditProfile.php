<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Profile')]
class EditProfile extends Component
{
    public User $user;
    public string $username;
    public ?string $bio;

    public bool $showSuccessIndicator = false;

    public function update(): void
    {
        $this->user->username = $this->username;
        $this->user->bio = $this->bio;
        $this->user->save();
        sleep(1);
        $this->showSuccessIndicator = true;
    }

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->username = $this->user->username;
        $this->bio = $this->user->bio;

    }

    public function render(): View
    {
        return view('livewire.edit-profile');
    }
}
