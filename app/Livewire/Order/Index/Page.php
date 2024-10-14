<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Page extends Component
{
    use WithPagination;

    public Store $store;
    public string $query = '';
    #[Url]
    public string $sortColumn = '';
    #[Url]
    public bool $sortAsc = false;


    public function updated(): void
    {
        $this->resetPage();
    }

    public function setSortKey(string $column): void
    {
        if ($column === $this->sortColumn) {
            $this->sortAsc = !$this->sortAsc;
            return;
        }
        $this->sortColumn = $column;
        $this->sortAsc = false;
    }

    public function validSortKey(): string
    {
        return match ($this->sortColumn) {
            'number' => 'number',
            'status' => 'status',
            'date' => 'ordered_at',
            'amount' => 'amount',
            default => ''
        };
    }

    public function render(): View
    {
        $orders = $this->store->orders()
            ->search($this->query)
            ->sort($this->validSortKey(), $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.order.index.page', [
            'orders' => $orders,
        ]);
    }
}
