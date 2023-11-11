<?php
namespace App\Service\RestaurantOwner;

use App\Models\RestaurantOwner;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use Illuminate\Validation\ValidationException;

class RestaurantOwnerService
{
    public function login(loginRequest $request)
    {
        $restaurantOwner = RestaurantOwner::whereEmail($request->email)->first();
        if (!$restaurantOwner || !Hash::check($request->password, $restaurantOwner->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email or password not correct'],
            ]);
        }
        return $restaurantOwner->createToken('token-name', ['restaurantowner'])->plainTextToken;
    }
}
