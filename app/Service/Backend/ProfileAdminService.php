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
}
