<?php
namespace App\Service\Frontend\ShowProduct;

use App\Models\Product;

class ShowProductService
{
    public function ShowProduct(Product $product)
    {
        return Product::where('category_id', $product->id)->get();
    }
}
