<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Backend\VerifyPasswordRequest;
use Illuminate\Auth\Events\Validated;

class ProfileAdminService
{
    public function getProfile()
    {
        return User::find(auth()->user()->id);
    }

    public function profileAdmin(UpdateProfileRequest $request)
    {
        $admin = auth()->user();
        $nameAndEmail = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->old_password) {
            if (Hash::check($request->old_password, $admin->password) == true) {
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
