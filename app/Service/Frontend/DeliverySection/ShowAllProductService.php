<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShowAllProductService
{
    public function index(Product $product)
    {
        return DB::table('products')
            ->select('products.id', 'products.name', 'products.image', 'products.price', 'products.description', 'products.category_id', 'products.restaurant_branche_id', 'categories.name as category_name', 'restaurant_branches.name as branch_name')
            ->join('restaurant_branches', 'products.restaurant_branche_id', '=', 'restaurant_branches.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.restaurant_branche_id', $product->id)
            ->where('products.status', 1)
            ->get();

        // return Product::with(['restaurantBranche:id,name', 'category:id,name'])
        //     ->where('restaurant_branche_id', $product->id)
        //     ->Active()
        //     ->get(['id', 'name', 'image', 'price', 'description', 'category_id', 'restaurant_branche_id']);
    }
}
