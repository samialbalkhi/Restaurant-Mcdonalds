<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CartRequest;
use App\Service\Frontend\DeliverySection\CartService;

class CartController extends Controller
{
    public function __construct(private CartService $AddToCardService)
    {
    }
    public function store(CartRequest $request)
    {
        return response()->json($this->AddToCardService->store($request));
    }
    public function  numberOfProduct()
    {
        return $this->AddToCardService->numberOfProduct();
    }
    public function  show()
    {
        return $this->AddToCardService->show();
    }
  
    public function  delete($rowId)
    {
        return $this->AddToCardService->delete($rowId);
    }
    public function  subtotal()
    {
        return $this->AddToCardService->subtotal();
    }
}
