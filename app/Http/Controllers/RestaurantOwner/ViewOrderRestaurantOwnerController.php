<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\ViewOrderRestaurantOwnerService;

class ViewOrderRestaurantOwnerController extends Controller
{
    public function __construct(private ViewOrderRestaurantOwnerService $ViewOrderRestaurantOwnerService)
    {
    }
    public function showbranch()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->showbranch());
    }
    public function viewdriver()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->viewdriver());
    }
    public function vieworder()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->vieworder());
    }
    public function viewReview()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->viewReview());
    }
    public function numberoforder()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->numberoforder());
    }
    public function paidorder()
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->paidorder());
    }
    public function viewTheOrderInvoice($orderId)
    {
        return response()->json($this->ViewOrderRestaurantOwnerService->viewTheOrdeaccounting($orderId));
    }
}
