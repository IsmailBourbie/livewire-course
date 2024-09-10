<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    public User $user;

    #[Validate]
    public string $username;

    #[Validate('max:200')]
    public ?string $bio;

    #[Validate('boolean')]
    public bool $receive_emails;

    public function setUser(User $user): void
    {
        $this->user = $user;
        $this->username = $this->user->username;
        $this->bio = $this->user->bio;
        $this->receive_emails = $this->user->receive_emails;
    }
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
        $this->user->receive_emails = $this->receive_emails;
        $this->user->save();
    }


}
