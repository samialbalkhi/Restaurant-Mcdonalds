<?php

namespace App\Http\Controllers\Frontend\ShowProduct;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowProduct\ShowProductService;

class ShowProductController extends Controller
{
    public function ShowProduct(Product $product,ShowProductService $ShowProductService)
    {
        return response()->json(
            $ShowProductService->ShowProduct($product)
        );
    }
}
