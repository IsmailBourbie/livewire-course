<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Counter extends Component
{

    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        if ($this->count >= 1)
            $this->count--;
    }

    public function render(): View
    {
        return view('livewire.counter');
    }
}
