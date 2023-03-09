<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'products_id',
    ];

    /**
     * Get the product that owns the ProductImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class,'products_id');
    }
}
