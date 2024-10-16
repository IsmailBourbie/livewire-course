<?php

namespace App\Livewire\Order\Index;

use App\Livewire\Order\Index\Forms\Filters;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Chart extends Component
{
    public Store $store;
    #[Reactive]
    public Filters $filters;
    public array $dataset = [];

    protected function fillDataset(): void
    {
        $results = $this->store->orders()
            ->select(
                DB::raw("DATE_FORMAT(ordered_at, '%Y-%m') as increment"),
                DB::raw("SUM(amount) as total"),
            )
            ->tap(function ($query) {
                if (true) {
                    $this->filters->apply($query);
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
