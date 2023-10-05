<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ProductReview;

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
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
