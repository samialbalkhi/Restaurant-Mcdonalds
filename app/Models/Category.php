<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function product()
    {
        return  $this->belongsTo(Product::class);
    }
}
