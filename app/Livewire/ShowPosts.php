<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Show Posts')]
class ShowPosts extends Component
{

    public PostForm $form;
    public bool $showCreateDialog = false;


    public function delete(Post $post): void
    {
        $post->delete();
    }

    public function create(): void
    {
        $this->form->create();
        $this->reset('showCreateDialog');
    }

    public function render(): View
    {
        return view('livewire.show-posts',
            [
                'posts' => Post::all()
            ]
        );
    }
}
