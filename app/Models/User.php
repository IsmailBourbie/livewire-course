<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'receive_emails' => 'boolean',
            'receive_updates' => 'boolean',
            'receive_offers' => 'boolean',
            'password' => 'hashed',
            'country' => Country::class,
        ];
    }

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }


    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class)->orderBy('position');
    }
}
