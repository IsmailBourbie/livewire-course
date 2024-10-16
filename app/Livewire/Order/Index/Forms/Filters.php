<?php

namespace App\Livewire\Order\Index\Forms;

use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Form;

class Filters extends Form
{
    public Store $store;
    public array $selectedProductsIds = [];

    public function init(Store $store): void
    {
        $this->store = $store;
        $this->selectedProductsIds = $this->store->products->pluck('id')->toArray();
    }

    public function products()
    {
        return $this->store->products;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('product_id', $this->selectedProductsIds);
    }

}
