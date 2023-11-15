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
        $user = RestaurantOwner::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email or password not correct'],
            ]);
        }

        return ['token' => $user->createToken('token-name', ['restaurantOwner'])->plainTextToken];
    }
}
