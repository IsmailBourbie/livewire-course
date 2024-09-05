<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Post')]
class CreatePost extends Component
{

    #[Rule('required', message: 'Yo, add a title')]
    #[Rule('min:4', message: 'Yo, too short')]
    public string $title = '';
    #[Rule('required')]
    #[Rule('min:4', message: 'Yo, too short')]
    #[Rule('max:100', message: 'Yo, too long')]
    public string $content = '';

    public function save(): void
    {
        $this->validate();
        Post::query()->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->redirect('show-posts', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
