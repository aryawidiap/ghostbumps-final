<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'location_id',
        'customer_name',
        'booking_date',
        'booking_hour',
        'number_of_persons',
        'status',
        'cancel_reason',
        'ticket_price'
    ];

    // Add json description if booked by admin?
    // user_id
    // location_id
    // customer_name
    // booking_time
    // status
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
