<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;

class ShowAllProductService
{
    public function index(Product $product)
    {
        return Product::with(['restaurantBranche:id,name', 'category:id,name'])
            ->where('restaurant_branche_id', $product->id)
            ->Active()
            ->get(['id', 'name', 'image', 'price', 'description', 'category_id', 'restaurant_branche_id']);
    }
}
