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
            return response(
                [
                    'message' => 'password or email is incorrect',
                ],
                401,
            );
        } else {
            return $user->createToken('token-name',['customer'])->plainTextToken;
        }
    }

    public function register(RegisterRequest $request)
    {
      $user=  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('token-name')->plainTextToken;
        $respones = [
            'user' => $user,
            'token' => $token,
        ];

        return response($respones, 201);
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return response()->json([
            'message' => 'logout',
        ]);
    }
}
