<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductsCategory;
use App\Models\ProductImages;
use App\Models\OrdersItems;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cost_price',
        'selling_price',
        'products_categories_id',
        'discounted_price',
        'details',
        'qty',
        'size',

    ];


    /**
     * Get the Category that owns the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category(): BelongsTo
    {
        return $this->belongsTo(ProductsCategory::class,'products_categories_id','id');
    }
    /**
     * Get all of the productImages for the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImages::class,'products_id','id');
    }

    /**
     * Get all of the OrderedItems for the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OrderedItems(): HasMany
    {
        return $this->hasMany(OrdersItems::class, 'products_id', 'id');
    }
}
