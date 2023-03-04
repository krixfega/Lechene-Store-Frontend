<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\OrdersItems;


class Orders extends Model
{
    use HasFactory;
     protected $table = 'orders';
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'order_no',
        'status',
        'total_profit',
        'total_selling_price',
        'total_cost_price',

    ];
    /**
     * Get the user that owns the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get all of the OrderItems for the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrdersItems::class);
    }
}
