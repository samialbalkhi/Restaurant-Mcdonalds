<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\RestaurantOwner\profileRestaurantOwnerService;

class ProfileRestaurantOwnerController extends Controller
{
    public function __construct(private profileRestaurantOwnerService $profileRestaurantOwnerService)
    {
    }
    public function getProfileRestaurantOwner()
    {
        return response()->json($this->profileRestaurantOwnerService->getProfileRestaurantOwner());
    }

    public function profileRestaurantOwner(Request $request)
    {
        return $this->profileRestaurantOwnerService->profileRestaurantOwner($request);
    }
    public function logout()
    {
         $this->profileRestaurantOwnerService->logout();
         return response()->data(
            
            key: 'success',
            message: 'logout ',
            statusCode: 200
            
            
        );
    }
    
}
