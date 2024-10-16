<?php

namespace App\Livewire\Order\Index;

use App\Livewire\Order\Index\Forms\Filters;
use App\Livewire\Traits\Searchable;
use App\Livewire\Traits\Sortable;
use App\Models\Order;
use App\Models\Store;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\StreamedResponse;

#[Lazy]
class Page extends Component
{
    public Store $store;
    public Filters $filters;

    public function mount(): void
    {
        $this->filters->init($this->store);
    }

    public function render(): View
    {
        return view('livewire.order.index.page');
    }
}
