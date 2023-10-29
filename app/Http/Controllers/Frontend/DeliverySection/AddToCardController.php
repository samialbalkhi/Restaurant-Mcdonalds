<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\DeliverySection\AddToCardService;

class AddToCardController extends Controller
{
    public function store(Request $request,AddToCardService $AddToCardService)
    {
        return $AddToCardService->store($request);
    }
    public function  numberOfContent(AddToCardService $AddToCardService)
    {
        return $AddToCardService->numberOfContent();
    }
    public function  destroy(AddToCardService $AddToCardService)
    {
    }

   
}
