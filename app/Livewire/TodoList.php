<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TodoList extends Component
{

    public string $todoItem = '';
    public array $todos = [
        'clean the dishes',
        'run tests',
        'play video game',
    ];

    public function add(): void
    {
        if (!empty(trim($this->todoItem))) {
            $this->todos[] = $this->todoItem;
            $this->reset('todoItem');
        }
    }

    public function render(): View
    {
        return view('livewire.todo-list');
    }
}
