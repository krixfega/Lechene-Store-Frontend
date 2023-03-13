<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Products;

class ProductsCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
    ];

    /**
     * Get all of the products for the ProductsCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Products::class,'products_categories_id');
    }
}
