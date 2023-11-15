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
    }
}
