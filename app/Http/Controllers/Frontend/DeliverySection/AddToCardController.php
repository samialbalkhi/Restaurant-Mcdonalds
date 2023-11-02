<?php

namespace App\Http\Controllers\Frontend\DeliverySection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Frontend\DeliverySection\AddToCardService;

class AddToCardController extends Controller
{
    private $AddToCardService ;
    public function __construct(AddToCardService $AddToCardService)
    {
        $this->AddToCardService = $AddToCardService;
    }
    public function store(Request $request)
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
