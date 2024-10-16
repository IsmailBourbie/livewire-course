<?php

namespace App\Livewire\Traits;

use Livewire\Attributes\Url;

trait Sortable
{
    #[Url]
    public string $sortColumn = '';
    #[Url]
    public bool $sortAsc = false;

    public function setSortKey(string $column): void
    {
        if ($column === $this->sortColumn) {
            $this->sortAsc = !$this->sortAsc;
            return;
        }
        $this->sortColumn = $column;
        $this->sortAsc = false;
    }

    public function getSortKey(): string
    {
        return match ($this->sortColumn) {
            'number' => 'number',
            'status' => 'status',
            'date' => 'ordered_at',
            'amount' => 'amount',
            default => ''
        };
    }

    public function getSortAsc(): string
    {
        return $this->sortAsc ? 'asc' : 'desc';
    }
}
