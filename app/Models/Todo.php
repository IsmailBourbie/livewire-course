<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    protected function scopeSortable($query, $todo)
    {
        return $todo->card->todos();
    }
}
