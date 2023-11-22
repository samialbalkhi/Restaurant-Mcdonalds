<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\RestaurantBranche;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RestaurantOwner extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guarded = [];
    protected $guard = 'restaurantOwner';
    public function restaurantBranche()
    {
        return $this->belongsTo(RestaurantBranche::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
