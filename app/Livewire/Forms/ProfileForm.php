<?php

namespace App\Livewire\Forms;

use App\Enums\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    public User $user;

    #[Validate]
    public string $username;

    #[Validate]
    public string $password;

    #[Validate('max:200')]
    public ?string $bio = null;

    #[Validate('required')]
    public Country $country;

    #[Validate('boolean')]
    public bool $receive_emails = false;
    #[Validate('boolean')]
    public bool $receive_updates = false;
    #[Validate('boolean')]
    public bool $receive_offers = false;

    public function setUser(User $user): void
    {
        $this->user = $user;
        $this->username = $this->user->username;
        $this->bio = $this->user->bio;
        $this->country = $this->user->country;
        $this->receive_emails = $this->user->receive_emails;
        $this->receive_updates = $this->user->receive_updates;
        $this->receive_offers = $this->user->receive_offers;
    }

    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'regex:/^[a-zA-Z0-9_]+$/',
                Rule::unique('users', 'username')->ignore($this->user ?? null),
            ]
        ];
    }

    public function update(): void
    {
        $this->validate();

        $this->user->username = $this->username;
        $this->user->bio = $this->bio;
        $this->user->country = $this->country;
        $this->user->receive_emails = $this->receive_emails;
        $this->user->receive_updates = $this->user->receive_emails ? $this->receive_updates : false;
        $this->user->receive_offers = $this->user->receive_emails ? $this->receive_offers : false;

        $this->user->save();
    }

    public function store()
    {
        $this->addRulesFromOutside(['password' => ['required', 'min:8']]);
        $this->validate();

        $new_user = User::create([
            'username' => $this->username,
            'password' => $this->password,
            'country' => $this->country,
            'receive_emails' => $this->receive_emails,
            'receive_updates' => $this->receive_updates,
            'receive_offers' => $this->receive_offers,
        ]);
        auth()->login($new_user);
        return redirect('edit-profile');
    }


}
