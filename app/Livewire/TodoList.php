<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]
class TodoList extends Component
{

    public string $todoItem = '';
    public array $todos = [];

    public function mount(): void
    {
        // Common use case: fetch data from DB Ex: Todos::all();
        $this->todos = [
            'clean the dishes',
            'run tests',
            'play video game',
        ];
    }

    public function updated($prop, $val): void
    {
        // Common use case: live validation;
        $this->$prop = strtolower($val);
    }

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
