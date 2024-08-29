<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class HelloWorld extends Component
{

    public function render(): View
    {
        return view('livewire.hello-world');
    }
}
