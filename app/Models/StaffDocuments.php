<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\staffs;

class StaffDocuments extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'staffs_id',

    ];



    /**
     * Get the staff that owns the StaffDocuments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(staffs::class, 'staffs_id', 'id');
    }
}
