<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Driver;
use App\Models\Product;
use App\Models\RestaurantOwner;
use App\Models\RestaurantReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantBranche extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function restaurantReviews()
    {
        return $this->hasMany(RestaurantReview::class);
    }
    public function restaurantOwner()
    {
        return $this->hasOne(RestaurantOwner::class);
    }
    public function ordersWithStatusTrue()
    {
        return $this->hasMany(Order::class)->where('status', true);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
