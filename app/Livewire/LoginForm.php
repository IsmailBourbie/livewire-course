<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Login")]
class LoginForm extends Component
{
    #[Rule('required')]
    #[Rule('min:4')]
    public string $username = "";

    #[Rule('required')]
    #[Rule('min:8')]
    public string $password = "";

    public function submit(): void
    {
        $this->validate();

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];


        if (Auth::attempt($credentials))
            $this->redirectIntended('/counter', navigate: true);
        else
            $this->addError('username', 'Invalid username or password.');

    }

    public function render(): View
    {
        return view('livewire.login-form');
    }
}
