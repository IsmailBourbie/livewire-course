<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Post')]
class CreatePost extends Component
{

    public PostForm $form;
    public $classes = '';


    public function save(): void
    {
        $this->form->create();
        $this->redirect('show-posts', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
