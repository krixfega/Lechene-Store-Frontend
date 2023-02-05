<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Orders;
use App\Models\Products;
class OrdersItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_id',
        'products_id',
        'name',
           'qty',
          'price'

       ];
       /**
        * Get the Orders that owns the OrdersItems
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function orders(): BelongsTo
       {
           return $this->belongsTo(Orders::class, 'orders_id', 'id');
       }

       public function products(): BelongsTo
       {
           return $this->belongsTo(Products::class, 'products_id', 'id');
       }
}
