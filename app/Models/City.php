<?php

namespace App\Models;

use App\Models\RestaurantBranche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
    public function restaurantBranche()
    {
        return $this->hasMany(RestaurantBranche::class);
    }
}
