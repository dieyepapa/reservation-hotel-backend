<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'email',
        'price_per_night',
        'address',
        'phone',
        'currency',
        'image_url'
    ];

    protected $casts = [
        'price_per_night' => 'decimal:2'
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price_per_night, 0, ',', ' ') . ' ' . $this->currency;
    }
}
