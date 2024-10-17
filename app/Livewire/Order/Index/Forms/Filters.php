<?php

namespace App\Livewire\Order\Index\Forms;

use App\Enums\Range;
use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    public Store $store;
    #[Url(as: 'products')]
    public array $selectedProductsIds = [];

    #[Url]
    public Range $range = Range::All_Time;

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
        $query = $this->applyProducts($query);
        $query = $this->applyRange($query);
        return $query;
    }

    public function applyProducts(Builder $query): Builder
    {
        return $query->whereIn('product_id', $this->selectedProductsIds);
    }

    public function applyRange(Builder $query): Builder
    {
        if ($this->range === Range::All_Time) {
            return $query;
        }
        return $query->whereBetween('ordered_at', $this->range->dates());
    }

    public function initSelectedProductIds(): void
    {
        if (empty($this->selectedProductsIds)) {
            $this->selectedProductsIds = $this->products()->pluck('id')->toArray();
        }
    }

}
