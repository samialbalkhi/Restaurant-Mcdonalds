<?php
namespace App\Service\Frontend;

use App\Models\User;
use App\Http\Requests\Backend\UpdateProfileRequest;

class ProfileCustomerService
{
    public function edit()
    {
        return auth()->user();
    }
    public function update(UpdateProfileRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }
}
