<?php

namespace App\Livewire\Order\Index;

use App\Livewire\Order\Index\Forms\Filters;
use App\Livewire\Traits\Searchable;
use App\Livewire\Traits\Sortable;
use App\Models\Order;
use App\Models\Store;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Table extends Component
{
    use WithPagination, Sortable, Searchable;

    public Store $store;
    #[Reactive]
    public Filters $filters;
    public array $selectedOrdersIds = [];
    public array $ordersIdsPerPage = [];

    public function refundSelected(): void
    {
        $orders = $this->store->orders()->whereIn('id', $this->selectedOrdersIds)->get();

        foreach ($orders as $order) {
            $this->refund($order);
        }

        $this->reset('selectedOrdersIds');
    }

    public function refund(Order $order): void
    {
        $this->authorize('update', $order);
        $order->refund();
    }

    public function archiveSelected(): void
    {
        $orders = $this->store->orders()->whereIn('id', $this->selectedOrdersIds)->get();

        foreach ($orders as $order) {
            $this->archive($order);
        }
    }

    public function archive(Order $order): void
    {
        $this->authorize('update', $order);
        $order->archive();
    }

    #[Renderless]
    public function export(): StreamedResponse
    {
        return $this->store->orders()->toCsv('orders.csv');
    }

    public function render(): View
    {
        $orders = $this->store->orders()
            ->tap(function ($query) {
                if (true) {
                    $this->filters->apply($query);
                }
            })
            ->search($this->query)
            ->sort($this->getSortKey(), $this->getSortAsc())
            ->paginate(5);

        $this->ordersIdsPerPage = $orders->map(fn($order) => (string)$order->id)->toArray();
        return view('livewire.order.index.table', [
            'orders' => $orders,
        ]);
    }

    public function placeholder(): View
    {
        return view('livewire.order.index.placeholder');
    }
}
