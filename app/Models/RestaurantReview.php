<?php

namespace App\Models;

use App\Models\User;
use App\Models\RestaurantBranche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function restaurantBranche()
    {
        return $this->belongsTo(RestaurantBranche::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
