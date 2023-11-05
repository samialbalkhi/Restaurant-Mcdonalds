<?php

namespace App\Models;

use App\Models\RestaurantBranche;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantOwner extends Model
{
    use HasFactory,HasApiTokens;
    protected $guarded = [];
    public function restaurantBranche()
    {
        return  $this->belongsTo(RestaurantBranche::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
