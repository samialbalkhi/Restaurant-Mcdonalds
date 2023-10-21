<?php
namespace App\Service\Frontend\ShowProduct;

use App\Models\Product;

class ShowProductService
{
    public function ShowProduct(Product $product)
    {
        return Product::where('category_id', $product->id)->get(['id', 'name', 'image', 'category_id']);
    }
    public function getOneProduct(Product $product)
    {
        return Product::where('id', $product->id)->get(['id', 'name', 'image', 'description','kcal']);
    }   
}
