<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]
class TodoList extends Component
{

    public string $draft;

    #[Computed]
    public function todos()
    {
        return auth()->user()->todos;
    }

    public function add(): void
    {
       $this->todosQuery()->create([
            'name' => $this->pull('draft'),
           'position' => $this->todosQuery()->max('position') + 1
        ]);
    }

    public function render(): View
    {
        return view('livewire.todo-list');
    }

    protected function todosQuery()
    {
        return auth()->user()->todos();
    }
}
