<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Profile')]
class EditProfile extends Component
{
    public User $user;

    #[Validate]
    public string $username;

    #[Validate('max:200')]
    public ?string $bio;

    public bool $showSuccessIndicator = false;

    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'regex:/^[a-zA-Z0-9_]+$/',
                Rule::unique('users', 'username')->ignore($this->user),
            ]
        ];
    }

    public function update(): void
    {
        $this->validate();

        $this->user->username = $this->username;
        $this->user->bio = $this->bio;
        $this->user->save();
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
