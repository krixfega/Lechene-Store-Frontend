<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\CartItems;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        // 'total_price',
    ];


   /**
    * Get the user that owns the Cart
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'users_id', 'id');
   }
    /**
     * Get all of the cart_items for the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart_items(): HasMany
    {
        return $this->hasMany(CartItems::class, 'carts_id','id');
    }
}
