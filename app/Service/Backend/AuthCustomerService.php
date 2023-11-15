<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use App\Http\Requests\Backend\RegisterRequest;
use Illuminate\Validation\ValidationException;

class AuthCustomerService
{
    public function login(loginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email or password not correct'],
            ]);
        }
        return ['token' => $user->createToken('token-name', ['customer'])->plainTextToken];
    }
}
