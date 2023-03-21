<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Orders;
use App\Models\User;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'orders_id',
        'invoice_id',
        'amount',
        'status',
    ];
    /**
     * Get the orders that owns the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orders(): BelongsTo
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }

    /**
     * Get the user that owns the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id',);
    }
}
