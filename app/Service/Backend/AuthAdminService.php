<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;

class AuthAdminService
{
    public function login(loginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) 
            return response()->json(['message' => 'password or email is incorrect'], 401);

            return $user->createToken('token-name', ['admin'])->plainTextToken;
        
    }
}
