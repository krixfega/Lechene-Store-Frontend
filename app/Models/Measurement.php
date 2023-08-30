<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Measurement extends Model
{
    use HasFactory;
    protected $table = "measurements";
    protected $fillable = [
        'users_id',
        'neck',
        'shoulder',
        'frontArc',
        'waist',
        'hip',
        'topLength',
        'trouserLength',
        'armHole',
        'roundSleeve',
        'thigh',
        'knee',
        'crotch',
        'upperBust',
        'bust',
        'N_N',
        'underBust',
        'bustPoint',
        'halfLength',
        'halfLengthBack',
        'highWaist',
        'shoulderToknee',
        'shoulderToHip',
        'fullLength',
        'dressLength',
        'sleeveLength',
        'calf',
        'chest',
        'stomach',
        'topHip',
        'biceps',
        'sleeve',
        'waistToKnee',
        'gender'
    ];
    /**
     * Get the user that owns the Measurement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
