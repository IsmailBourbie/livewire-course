<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class PostRow extends Component
{

    public PostForm $form;

    public Post $post;

    public bool $showEditDialog = false;

    public function archive()
    {
        $this->post->archive();
    }

    public function mount(Post $post): void
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        $this->form->update();

        $this->post->refresh();

        $this->reset('showEditDialog');
    }

    public function render(): View
    {
        return view('livewire.post-row');
    }
}
