<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\fibrics;
class fibricsImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fibric_id',
        ];
    
        /**
         * Get the fibric that owns the FibricImages
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function fibric(): BelongsTo
        {
            return $this->belongsTo(fibrics::class,'fibric_id','id');
        }
    
}
