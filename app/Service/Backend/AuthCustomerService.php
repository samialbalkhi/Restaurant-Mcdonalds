<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use App\Http\Requests\Backend\RegisterRequest;

class AuthCustomerService
{
    public function login(loginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'password or email is incorrect'], 401);
        } else {
            return $user->createToken('token-name', ['customer'])->plainTextToken;
        }
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('token-name', ['customer'])->plainTextToken;

        return ['user' => $user, 'token' => $token];
    }
    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();
    }
}
