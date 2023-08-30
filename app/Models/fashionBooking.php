<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\fibrics;
use App\Models\Tailor;
use App\Models\BookingStyles;

class fashionBooking extends Model
{
    use HasFactory;
    // protected $table = 'orders';
    // protected $primaryKey = "id";
    protected $fillable = [
        'fabrics_id',
        'users_id',
        'fullName',
        'booking_no',
        'phone_no',
        'address',
        'email',
        'gender',
        'qty',
        'income',
        'bookingStatus',
        'desc',
        'pickupDate',
        'bookingStatus',
       'customer_id',

    ];
    /**
     * Get the tailor associated with the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tailor(): HasOne
    {
        return $this->hasOne(Tailor::class,'booking_id');
    }
    /**
     * Get the fabric that owns the fashionBooking
     *i
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fabric(): BelongsTo
    {
        return $this->belongsTo(fibrics::class, 'fabrics_id', 'id');
    }
    /**
     * Get all of the styles for the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function styles(): HasMany
    {
        return $this->hasMany(BookingStyles::class,'fashion_bookings_id','id');
    }


    /**
     * Get the user that owns the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    /**
     * Get the user that owns the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

}
