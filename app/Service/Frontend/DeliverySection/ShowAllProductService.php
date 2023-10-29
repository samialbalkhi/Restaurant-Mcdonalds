<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;

class ShowAllProductService
{
    public function index(Product $product)
    {
        return Product::where('category_id', $product->id)->Active()->get(['id', 'name', 'image','price','description','category_id']);

    }
}
