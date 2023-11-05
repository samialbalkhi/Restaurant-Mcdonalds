<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\loginRequest;
use App\Service\RestaurantOwner\RestaurantOwnerService;

class AuthRestaurantOwnerController extends Controller
{
    public function __construct(private RestaurantOwnerService $restaurantOwnerService)
    {
    }

    public function login(loginRequest $request)
    {
        return response()->json(
            $this->restaurantOwnerService->login($request));
    }
   

}
