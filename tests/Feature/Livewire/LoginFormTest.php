<?php

namespace Tests\Feature\Livewire;

use App\Livewire\LoginForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LoginFormTest extends TestCase
{
    use RefreshDatabase;


    public function test_renders_successfully()
    {
        Livewire::test(LoginForm::class)
            ->assertStatus(200)->assertSee('Login');
    }

    public function test_it_login_a_user(): void
    {
        $user = User::factory()->create();

        $response = Livewire::test(LoginForm::class)
            ->set('username', $user->username)
            ->set('password', 'password')
            ->call('submit');

        $this->assertAuthenticated();
        $response->assertRedirect('/counter');
    }

    public function test_it_cannot_login_for_incorrect_credentials(): void
    {
        User::factory()->create();

        $response = Livewire::test(LoginForm::class)
            ->set('username', 'incorrect')
            ->set('password', 'empty password')
            ->call('submit');

        $response->assertHasErrors('username');
        $this->assertGuest();
    }

    #[DataProvider('validationRules')]
    public function test_it_require_valid_inputs($inputName, $inputValue): void
    {
        $response = Livewire::test(LoginForm::class)
            ->set($inputName, $inputValue)
            ->call('submit');

        $response->assertHasErrors($inputName);
    }

    public static function validationRules(): array
    {
        return [
            'username is required' => ['username', ''],
            'username must be more than 4 characters' => ['username', 'tes'],

            'password is required' => ['password', ''],
            'password must be more than 8 characters' => ['password', 'passwor'],
        ];
    }
}
