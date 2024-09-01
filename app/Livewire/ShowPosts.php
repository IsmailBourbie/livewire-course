<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class ShowPosts extends Component
{

    public function delete(Post $post): void
    {
        $post->delete();
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
