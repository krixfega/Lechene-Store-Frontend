<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\fibrics;
use App\Models\Tailor;

class fashionBooking extends Model
{
    use HasFactory;
    // protected $table = 'orders';
    // protected $primaryKey = "id";
    protected $fillable = [
        'fullname',
        'booking_no',
        'phone_no',
        'address',
        'email',
        'gender',
        'qty',
        'income',
        'price',
        'booking_status',
        'comment',
        'order',
        'fabrics_id',
        'bustFrontArc',
        'bustBackArc',
        'shortSleeveElbow',
        'shortSleeveRoundElbow',
        'shortSleeveFullSleeveLength',
        'neck',
        'shoulder',
        'OffShoulder',
        'upperBust',
        'bust',
        'underBust',
        'bustPoint',
        'N_N',
        'acrossF_B',
        'halfLengthF_B',
        'topLength',
        'waist_highwaist',
        'hip_hipLength',
        'thigh_knee_ankle',
        'kneeCircumfrence',
        'shoulderToHip_knee',
        'waistToknee',
        'armhole_hicep',
        'sleeve',
        'roundSleeve',
        'wrist',
        'trouserLength',
        'fullLength',
        'dressLength',
        'shirt_Trouser',
        'Length',
        'RoundKnee',
        'KneeLength',
        'waist_hips',
        'thigh',
        'ankle',
        'crotchF_B',
       ' corsetLength',
        'Length3_4',


    ];
    /**
     * Get the tailor associated with the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tailor(): HasOne
    {
        return $this->hasOne(Tailor::class);
    }
    /**
     * Get the fabric that owns the fashionBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fabric(): BelongsTo
    {
        return $this->belongsTo(fibrics::class, 'fabrics_id', 'id');
    }
}
