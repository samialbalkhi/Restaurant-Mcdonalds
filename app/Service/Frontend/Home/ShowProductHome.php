<?php
namespace App\Service\Frontend\Home;


use App\Models\Product;

class ShowProductHome
{
    public function Show_the_last_three_products()
    {
        return Product::orderBy('id', 'desc')
            ->take(3)
            ->get(['id','name','description','image']);
    }

    public function FeaturedProduct()
    {
        return Product::where('featured', 1)
        ->orderBy('id', 'desc')
        ->take(4)
        ->get(['id','name','description','image']);
    }

   
}
