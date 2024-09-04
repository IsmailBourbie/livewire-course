<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class PostRow extends Component
{

    public Post $post;

    public function archive()
    {
        $this->post->archive();
    }

    public function mount(Post $post): void
    {
        $this->post = $post;
    }
    public function render(): View
    {
        return view('livewire.post-row');
    }
}
