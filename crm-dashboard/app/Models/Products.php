<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProductsCategory;

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
        return $this->belongsTo(ProductsCategory::class);
    }
}
