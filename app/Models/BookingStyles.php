<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\fashionBooking;

class BookingStyles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fashion_bookings_id',
    ];


    /**
     * Get the booking that owns the BookingStyles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(fashionBooking::class, 'fashion_bookings_id', 'id');
    }

}
