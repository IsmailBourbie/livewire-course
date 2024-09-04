<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
    use HasFactory;

    public function archive(): void
    {
        $this->forceFill(['is_archived' => true])->save();
    }
}
