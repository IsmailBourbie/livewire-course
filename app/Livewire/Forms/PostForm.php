<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{

    #[Rule('required', message: 'Yo, add a title')]
    #[Rule('min:4', message: 'Yo, too short')]
    public string $title = '';
    #[Rule('required')]
    #[Rule('min:4', message: 'Yo, too short')]
    #[Rule('max:100', message: 'Yo, too long')]
    public string $content = '';

    public function create(): void
    {
        $this->validate();
        Post::query()->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

    }
}
