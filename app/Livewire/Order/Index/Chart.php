<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Chart extends Component
{
    public Store $store;
    public array $dataset = [];
    public bool $filtered = false;

    public function filter(): void
    {
        $this->filtered = true;
    }

    protected function fillDataset(): void
    {
        $results = $this->store->orders()
            ->select(
                DB::raw("DATE_FORMAT(ordered_at, '%Y-%m') as increment"),
                DB::raw("SUM(amount) as total"),
            )
            ->tap(function ($query) {
                if ($this->filtered) {
                    $query->whereBetween('ordered_at', [now()->subMonths(7), now()]);
                }
            })
            ->groupBy('increment')
            ->get();
        $this->dataset['values'] = $results->pluck('total')->toArray();
        $this->dataset['labels'] = $results->pluck('increment')->toArray();
    }

    public function render(): View
    {
        $this->fillDataset();

        return view('livewire.order.index.chart');
    }

    public function placeholder(): View
    {
        return view('livewire.order.index.chart-placeholder');
    }
}
