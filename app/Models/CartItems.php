<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Cart;
class CartItems extends Model
{
    use HasFactory;
     protected $fillable = [
        'carts_id',
        'products_id',
        'total_price',
        'qty',

    ];

   /**
    * Get the products that owns the CartItems
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function prod(): BelongsTo
   {
       return $this->belongsTo(Products::class,'products_id');
   }
   public function cart(): BelongsTo
   {
       return $this->belongsTo(Cart::class,'carts_id');
   }




}
