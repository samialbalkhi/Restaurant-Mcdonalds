<?php

namespace App\Models;

use App\Models\RestaurantBranche;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantOwner extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guarded = [];
    protected $guard='restaurantowner';

    public function restaurantBranche()
    {
        return $this->belongsTo(RestaurantBranche::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
