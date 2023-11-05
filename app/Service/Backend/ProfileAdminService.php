<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Requests\Backend\VerifyPasswordRequest;

class ProfileAdminService{

    public function edit()
    {
        return auth()->user();
    }

    public function update(UpdateProfileRequest $request,User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    // $return = ['update profile sucessfully'];
    // $fails = [' old password  not correct'];
    // $admin = auth('admin')->user();
    // $updatedFiled = [
    //     'name' => $request->name,
    //     'email' => $request->email,
    // ];

    // if ($request->old_password) {
    //     if ($this->cheackPassword($admin, $request->old_password) == true) {

    //         $updatedFiled = array_merge($updatedFiled, [
    //             'password' => $request->new_password,
    //         ]);
    //     } else {
    //         return response()->json(['message' => $fails], 422);
    //     }
    // }
    // auth('admin')->user()->update($updatedFiled);
    // return response()->json(['message' => $return]);

}
