<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Frontend\DeliverySection\ShowAllProductService;

class ShowAllProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ShowAllProductService $showAllProductService,Product $product)
    {
        return response()->json($showAllProductService->index($product));
    }
}
