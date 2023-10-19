<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\Home\ShowProductService;

class ShowLastProductController extends Controller
{
    private $ShowProductService;
    public function __construct(ShowProductService $ShowProductService)
    {
        $this->ShowProductService = $ShowProductService;
    }
    public function Show_the_last_three_products()
    {
        return response()->json($this->ShowProductService->Show_the_last_three_products());
    }
    public function FeaturedItems()
    {
        return response()->json($this->ShowProductService->FeaturedItems());
    }
}
