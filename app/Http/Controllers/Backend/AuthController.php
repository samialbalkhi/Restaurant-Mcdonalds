<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\loginRequest;
use App\Http\Requests\Backend\RegisterRequest;

class AuthController extends Controller
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('token-name', ['customer'])->plainTextToken;

        return response()->json([$user, $token], 201);
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return response()->json(
            [
                'message' => 'logout success',
            ],
            200,
        );
    }
}
