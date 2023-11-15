<?php
namespace App\Service\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\RegisterRequest;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Frontend\UpdateProfileCustomerRequest;

class ProfileCustomerService
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('token-name', ['customer'])->plainTextToken;

        return ['token' => $token];
    }
    public function getProfileCustomer()
    {
        return User::find(auth()->user()->id);
    }

    public function profileCustomer(UpdateProfileCustomerRequest $request)
    {
        $user = auth()->user();
        $nameAndEmail = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->old_password) {
            if (Hash::check($request->old_password, $user->password) == true) {
                $nameAndEmail = array_merge($nameAndEmail, [
                    'password' => $request->new_password,
                ]);
            } else {
                return response()->data(
                key: 'error',
                message: 'old password  not correct',
                statusCode: 422);
            }
        }
        auth()
            ->user()
            ->update($nameAndEmail);

        return response()->data(
            key: 'success',
            message: 'update profile sucessfully',
            statusCode: 200);
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();
    }
}
