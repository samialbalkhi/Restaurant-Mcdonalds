<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function OurResponsibility()
    {
        return $this->hasMany(Ourresponsibility::class);
    }

    public function mycafes()
    {
        return $this->hasMany(MyCafe::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function ourrestaurants()
    {
        return $this->hasMany(Ourrestaurant::class);
    }

    public function careers()
    {
        return $this->hasMany(Career::class);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

}
