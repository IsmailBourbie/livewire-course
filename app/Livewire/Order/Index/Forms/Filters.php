<?php

namespace App\Livewire\Order\Index\Forms;

use App\Enums\Range;
use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    public Store $store;
    #[Url(as: 'products')]
    public $selectedProductsIds = [];

    #[Url]
    public Range $range = Range::All_Time;

    #[Url(except: '')]
    public string $start = '';
    #[Url(except: '')]
    public string $end = '';

    public function init(Store $store): void
    {
        $this->store = $store;
        $this->initSelectedProductIds();
        $this->initRange();
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
        if ($this->range === Range::Custom) {
            $start = Carbon::createFromFormat('Y-m-d', $this->start);
            $end = Carbon::createFromFormat('Y-m-d', $this->end);
            return $query->whereBetween('ordered_at', [$start, $end]);
        }
        return $query->whereBetween('ordered_at', $this->range->dates());
    }

    public function initRange(): void
    {
        if ($this->range !== Range::Custom) {
            $this->reset('start', 'end');
        }
    }

    public function initSelectedProductIds(): void
    {
        if (!is_array($this->selectedProductsIds)) $this->selectedProductsIds = [];
        if (empty($this->selectedProductsIds)) {
            $this->selectedProductsIds = $this->products()->pluck('id')->toArray();
        }
    }

}
