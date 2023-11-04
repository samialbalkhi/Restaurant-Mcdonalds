<?php

namespace App\Http\Controllers\Frontend\ShowProduct;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ShowProduct\ShowProductService;

class ShowProductController extends Controller
{
    public function __construct(private ShowProductService $ShowProductService)
    {
    }
    public function ShowProduct(Product $product)
    {
        return response()->json(
            $this->ShowProductService->ShowProduct($product)
        );
    }
    public function getOneProduct(Product $product)
    {
        return response()->json(
            $this->ShowProductService->getOneProduct($product)
        );
    }
}
