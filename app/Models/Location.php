<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'photo_path',
        'address',
        'description',
        'short_description',
        'location_price',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
