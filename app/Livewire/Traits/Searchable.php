<?php

namespace App\Livewire\Traits;

trait Searchable
{
    public string $query = '';

    public function updatedSearchable(string $property): void
    {
        if ($property === 'query')
            $this->resetPage();
    }


}
