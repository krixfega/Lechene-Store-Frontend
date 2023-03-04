<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\fashionBooking;
use App\Models\User;

class Tailor extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'user_id',
        'total_Price',
        'Paid_price',
        'balance_price',
    ];



    /**
     * Get the user that owns the Tailor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the bookings that owns the Tailor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(fashionBooking::class, 'booking_id', 'id');
    }

}
