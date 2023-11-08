<?php

namespace App\Models;

use App\Models\RestaurantBranche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function featured()
    {
        return $this->featured ? 'Yes' : 'No';
    }

    public function restaurantBranche()
    {
        return $this->belongsTo(RestaurantBranche::class,'restaurant_branche_id');
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
