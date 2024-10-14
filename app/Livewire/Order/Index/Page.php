<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Page extends Component
{
    use WithPagination;

    public Store $store;
    public string $query = '';

    public function updated(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $orders = $this->store->orders()
            ->search($this->query)
            ->paginate(10);
        
        return view('livewire.order.index.page', [
            'orders' => $orders,
        ]);
    }
}
