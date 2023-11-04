<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use Illuminate\Validation\ValidationException;

class AuthAdminService
{
    public function login(loginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) 
        throw ValidationException::withMessages([
            'email' => ['Email or password not correct']
        ]);

            return $user->createToken('token-name', ['admin'])->plainTextToken;
        
    }
}
