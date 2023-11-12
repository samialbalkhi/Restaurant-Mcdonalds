<?php
namespace App\Service\RestaurantOwner;

use App\Models\RestaurantOwner;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RestaurantOwnerService
{
    public function login(loginRequest $request)
    {
        if (Auth::guard('restaurantOwner')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $restaurantOwner = Auth::guard('restaurantOwner')->user();
            return 
                $restaurantOwner->createToken('token-name', ['*'])->plainTextToken;
        }
        throw ValidationException::withMessages([
            'email' => ['Email or password not correct'],
        ]);
    }
}
