<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\fashionBooking;
use App\Models\fibricsImages;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fibrics extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'typeOrColors',
        'qty',
        'cost_price',
        'selling_price',
        'details'


    ];
    /**
     * Get all of the Bookings for the fibrics
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Bookings(): HasMany
    {
        return $this->hasMany(fashionBooking::class);
    }
    public function FibricImages(): HasMany
    {
        return $this->hasMany(fibricsImages::class);
    }
}
