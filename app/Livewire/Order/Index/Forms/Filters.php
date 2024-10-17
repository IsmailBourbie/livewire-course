<?php

namespace App\Livewire\Order\Index\Forms;

use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    public Store $store;
    #[Url]
    public array $selectedProductsIds = [];

    public function init(Store $store): void
    {
        $this->store = $store;
        $this->initSelectedProductIds();
    }

    public function products()
    {
        return $this->store->products;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('product_id', $this->selectedProductsIds);
    }

    public function initSelectedProductIds(): void
    {
        if (empty($this->selectedProductsIds)) {
            $this->selectedProductsIds = $this->products()->pluck('id')->toArray();
        }
    }

}
