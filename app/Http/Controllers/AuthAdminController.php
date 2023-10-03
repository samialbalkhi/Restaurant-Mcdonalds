<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function login(Request $request)
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
            return $user->createToken('token-name',['admin'])->plainTextToken;
        }
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
