<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\Exportable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Order extends Model
{
    use HasFactory, Exportable;

    protected $casts = [
        'status' => Status::class,
        'ordered_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/300?img=' . ((string)crc32($this->email))[0];
    }

    public function dateForHumans()
    {
        return $this->ordered_at->format(
            $this->ordered_at->year === now()->year
                ? 'M d, g:i A'
                : 'M d, Y, g:i A'
        );
    }

    public function amountForHumans()
    {
        return Number::currency($this->amount);
    }

    public function archive()
    {
        $this->delete();
    }

    public function refund()
    {
        $this->status = 'refunded';

        $this->save();
    }

    public function scopeSearch(Builder $query, $search)
    {
        return $query->whereLike('email', "%$search%")
            ->orWhereLike('number', "%$search%");
    }

    public function scopeSort(Builder $query, string $sortColumn, string $sortDirection = 'asc'): Builder
    {
        if (empty($sortColumn)) {
            return $query;
        }
        return $query->orderBy($sortColumn, $sortDirection);
    }
}
