<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use App\Models\staffs;
use App\Models\Tailor;
use App\Models\Orders;
use App\Models\fashionBooking;
use App\Models\payment;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'dob',
        'role',
        'phone',
        'password',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
/**
 * Get the Staff associated with the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function staff(): HasOne
{
    return $this->hasOne(staffs::class);
}
/**
 * Get the Tailor associated with the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function tailor(): HasOne
{
    return $this->hasOne(Tailor::class);
}

/**
 * Get all of the bookings for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function fashion_bookings(): HasMany
{
    return $this->hasMany(fashionBooking::class, 'users_id');
}

/**
 * Get all of the orders for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function orders(): HasMany
{
    return $this->hasMany(Orders::class, 'user_id');
}
public function payments(): HasMany
{
    return $this->hasMany(payment::class, 'users_id');
}
}
